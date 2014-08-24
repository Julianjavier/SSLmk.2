from flask import Flask, session, request, render_template, redirect
import mysql.connector

from werkzeug.security import generate_password_hash
app = Flask(__name__)
app.secret_key = 'TRUE'


@app.route("/")
def index():
    if not session.has_key("loggedin"):
        session["loggedin"]= False
    db = mysql.connector.connect(user="root", password="root", host="localhost", port="8889", database="fruit")
    cvar = db.cursor()
    cvar.execute("SELECT name, color, id FROM fruit_table")
    data = cvar.fetchall()
    return render_template("userPage.html", pagedata=data)


@app.route("/login")
def loginform():
    #get form for add form
    return render_template('login.html')

@app.route("/logout")
def logout():
    session["loggedin"]= False
    return redirect("/")



@app.route("/addform")
def showForm():
    #get form for add form
    return render_template('form.html')


@app.route("/addaction", methods=["GET", "POST"])
def addAction():
    name = request.form["name"]
    color = request.form["color"]
    db = mysql.connector.connect(user="root", password="root", host="localhost", port="8889", database="fruit")
    cvar = db.cursor()
    cvar.execute("insert into fruit_table (name, color) values (%s, %s)" , (name, color))
    db.commit()
    return redirect("/")



@app.route("/deleteaction/<id>", methods=["GET", "POST"])
def delete():
    id = request.query_string
    return id



@app.route("/loginaction", methods=["GET", "POST"])
def loginaction():
    username = request.form["userName"]
    password = request.form["passWord"]

    db = mysql.connector.connect(user="root", password="root", host="localhost", port="8889", database="fruit")
    cvar = db.cursor()
    cvar.execute("SELECT username FROM users WHERE username = %s AND password = %s", (username, password))
    data = cvar.fetchall()

    if(cvar.rowcount > 0):
        session["loggedin"]=True
        return redirect("/addform")
    else:
        session["loggedin"]=False
        return redirect("/login")




    #action for adding functionality
    #and after run send index



if __name__ == '__main__':
    app.debug = True
    app.run()