<?php

echo <<<STYLE
<style>
html {
    scroll-behavior: smooth;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
    margin: 0;
    padding: 0;
    background: rgb(35,35,35);
    color:#ffffff;
}

#container {
	display: none;
    height:420px;
    margin: 0;
	position:relative;
}

.display {
	vertical-align: middle;
 	width:100%;
	height:100%;
	position:absolute;
	margin:0 auto;
}

#imageSlider {
    margin: auto;
    height:380px;
    width:100%;
    position:relative;
	float:left;	
}

.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

.nav-logo{
	height:70px;
    width:300px;
	float:left;
	margin:0 auto;
	padding:0px;
}
#top-nav{
	height:30px;
    width:100%;
    position:relative;
    background:#ff1a1a;
	float:left;
	text-align:right;
	display:inline;
	font-size:15px;
}

#top-nav ul,li{
	display:inline;
	padding:2px;
	overflow:hidden;
	margin-right: 5px;
}
#nav{
    height:70px;
    width:100%;
    position:relative;
    background:#262626;
	float:left;
	text-align:right;
	display:inline;
	font-size:20px;
}
#nav ul{	
	padding:0;
	overflow:hidden;
}

.nav-link{
	display:inline;
	text-decoration:none;
	text-align:right;

}
.nav-link1 a{
	text-decoration:none;
	color:#ffffff;
	width:50px;
	display:inline;
}

.nav-link1 :hover{
	
	color:#262626;
	
	
}
.nav-link1:visited{
	color:#262626;  
}
.nav-link1 :active{
	color:#262626;
}
.nav-link a{
	text-decoration:none;
	color:#ffe6e6;
	width:50px;
	display:inline;
	padding:35px 35px 25px 35px;
}

.nav-link :hover{
	
	color:#ff1a1a;
	
	
}
.nav-link:visited{
	color:#ff1a1a;  
}
.nav-link :active{
	color:#ff1a1a;
}

input[type=text], select {
    width: 20%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;


}


input[type=text], select {
    width: 50%;
    padding: 8px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=password], select {
    width: 50%;
    padding: 8px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=email], select {
    width: 50%;
    padding: 8px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=number], select {
    width: 50%;
    padding: 8px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
button[type=submit] {
    width: 50%;
    background-color: #ff1a1a;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button[type=submit]:hover {
    background-color: #e60000;
}


.shippingDetail{
	
    width: 40%;
    border: 1px solid rgb(26,26,26);
    border-radius: 6px;
   
    line-height: 20px;
    box-shadow: 0 0 5px #000000;
	background:rgb(26,26,26,0.5);
}

.senderDetail{
    width: 40%;
    border: 1px solid rgb(26,26,26);
    border-radius: 6px;
    line-height: 20px;
    box-shadow: 0 0 5px #000000;
	background:rgb(26,26,26,0.5);
}

#loginForm{
	width: 50%;
    position:relative;
    float:right;
}
#regForm{
	width: 50%;
	position:relative;
	float:right;
	
}
.title{
	text-align:center;
	font-family:helvetica;
	font-weight:bold;
	margin-top:0px;
	color: #ffffff;
	font-size: 30px;
}

footer{
    height:100px;
    width:100%;
    position:relative;
	float:left;
	background: rgb(255,0,0,0.5);
	text-align:center;
}
#whoarewe{
	width: 80%;
    border: 1px solid rgb(26,26,26);
    border-radius: 6px;
    line-height: 20px;
    box-shadow: 0 0 5px #000000;
	background:rgb(26,26,26,0.5);
	margin-left:130px;
	padding:20px;
}
#ourpeople{
	width: 80%;
    border: 1px solid rgb(26,26,26);
    border-radius: 6px;
    line-height: 20px;
    box-shadow: 0 0 5px #000000;
	background:rgb(26,26,26,0.5);
	margin-left:130px;
	padding:20px;
}

#ouraircraft{
	width: 80%;
    border: 1px solid rgb(26,26,26);
    border-radius: 6px;
    line-height: 30px;
    box-shadow: 0 0 5px #000000;
	background:rgb(26,26,26,0.5);
	margin-left:130px;
	padding:20px;
}
#dispatch{
	width: 80%;
    border: 1px solid rgb(26,26,26);
    border-radius: 6px;
    line-height: 20px;
    box-shadow: 0 0 5px #000000;
	background:rgb(26,26,26,0.5);
	margin-left:130px;
	padding:20px;
}
#eagle{
	width: 80%;
    border: 1px solid rgb(26,26,26);
    border-radius: 6px;
    line-height: 20px;
    box-shadow: 0 0 5px #000000;
	background:rgb(26,26,26,0.5);
	margin-left:130px;
	padding:20px;
}
#values{
	width: 80%;
    border: 1px solid rgb(26,26,26);
    border-radius: 6px;
    line-height: 20px;
    box-shadow: 0 0 5px #000000;
	background:rgb(26,26,26,0.5);
	margin-left:130px;
	padding:20px;
}

.air-charter{
	width: 80%;
    border: 1px solid rgb(26,26,26);
    border-radius: 6px;
    line-height: 20px;
    box-shadow: 0 0 5px #000000;
	background:rgb(26,26,26,0.5);
	margin-left:130px;
	padding:20px;
}
.battery-shop{
	width: 80%;
    border: 1px solid rgb(26,26,26);
    border-radius: 6px;
    line-height: 20px;
    box-shadow: 0 0 5px #000000;
	background:rgb(26,26,26,0.5);
	margin-left:130px;
	padding:20px;
}
#about{
	width: 80%;
    border: 1px solid rgb(26,26,26);
    border-radius: 6px;
    line-height: 20px;
    box-shadow: 0 0 5px #000000;
	background:rgb(26,26,26,0.5);
	margin-left:130px;
	padding:20px;
}
#contact{
	width: 80%;
    border: 1px solid rgb(26,26,26);
    border-radius: 6px;
    line-height: 20px;
    box-shadow: 0 0 5px #000000;
	background:rgb(26,26,26,0.5);
	margin-left:130px;
	padding:20px;x
}
</style>
STYLE;
?>