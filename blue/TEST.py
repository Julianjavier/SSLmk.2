Day8.py

from flask import Flask
from flask import redirect
from flask import render_template
from flask import session
from flask import request
from flask import escape
from flask import url_for
import mysql.connector

app = Flask(__name__)

app.secret_key = 'Jordan'

@app.route('/')
def index():
	#session has key
	if not session.has_key("loggedin"):
		session["loggedin"] = 0

	#display fruits
	db = mysql.connector.connect(user="root", password="root", host="localhost", port="8889", database="fruits")
	cvar = db.cursor()
	cvar.execute("select name, color, id from fruit_table")
	data = cvar.fetchall()
	return render_template("body.html", pagedata = data)

@app.route('/logout')
def logout():
	session["loggedin"] = 0
	return redirect("/")

@app.route('/loginform')
def loginform():
	return render_template("loginform.html")
	#go get the html and include
	#add fruit from

@app.route('/loginaction', methods= ["POST", "GET"])
def loginaction():
	username = request.form["username"]
	password = request.form["password"]

	db = mysql.connector.connect(user="root", password="root", host="localhost", port="8889", database="fruits")
	cvar = db.cursor()
	cvar.execute("select username from users where username = %s and password = %s",(username,password))
	data = cvar.fetchall()

	if(cvar.rowcount > 0):
		session["loggedin"] = 1
		return redirect("/addform")
	else:
		session["loggein"] = 0
		return redirect("/loginform")

@app.route('/addform')
def showform():
	if(session["loggedin"] == 0):
		return redirect("/loginform")
	else:
		return render_template("addform.html")
		#go get the html and include
		#add fruit from

@app.route('/addaction', methods= ["POST", "GET"])
def addaction():
	name = request.form["name"]
	color = request.form["color"]

	db = mysql.connector.connect(user="root", password="root", host="localhost", port="8889", database="fruits")
	cvar = db.cursor()
	cvar.execute("insert into fruit_table (name,color) values (%s,%s)",(name,color))
	db.commit()
	return redirect("/")
	#add action
	#after add go back to the index

@app.route('/update')
def updateform():
	query = request.query_string
	db = mysql.connector.connect(user='root',password='root',host='localhost', port='8889',database='fruits')
	cur = db.cursor()
	cur.execute('select name, color, id from fruit_table where id=%s', (query, ))

	data = cur.fetchall()
	return render_template('updateform.html', pagedata = data)

@app.route('/updateaction', methods = ['GET', 'POST'])
def updateaction():
	db = mysql.connector.connect(user='root',password='root',host='127.0.0.1', port='8889',database='fruits')
	cur = db.cursor()

 	name = request.form["name"]
	color = request.form["color"]
	id = request.form["id"]

	#return str(query)
	cur.execute("update fruit_table set name=%s, color=%s where id=%s",(name,color,id))
	db.commit()
	return redirect('/')


@app.route('/delete', methods = ['GET', 'POST'])
def delete():
	quary = request.query_string
	db = mysql.connector.connect(user='root',password='root',host='localhost', port='8889',database='fruits')
 	cur = db.cursor()
 	cur.execute("delete from fruit_table where id=%s",(quary, ))
	db.commit()
	return redirect('/')


if __name__ == '__main__':
	app.run(debug=True)