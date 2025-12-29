<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Add Product | Inventory Management</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<!-- Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
:root{
--app-black:#000000;
--app-dark:#121212;
--app-gray:#181818;
--app-light-gray:#282828;
--app-accent:#FFFFFF;
--app-white:#FFFFFF;
--app-text-gray:#B3B3B3;
--app-card-bg:rgba(24,24,24,0.8);
--navbar-h:70px;
}
body{
background:linear-gradient(180deg,var(--app-black)0%,var(--app-dark)100%)!important;
color:var(--app-white)!important;
font-family:'Inter',-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;
min-height:100vh;
margin:0;
padding:0;
padding-top:var(--navbar-h);
}
/* ========= Navbar ========= */
.spotify-navbar{
position:fixed;
top:0;
left:0;
right:0;
height:var(--navbar-h);
background:linear-gradient(180deg,var(--app-black)0%,var(--app-dark)40%);
backdrop-filter:blur(10px);
border-bottom:1px solid rgba(255,255,255,0.08);
padding:0 30px;
z-index:1030;
display:flex;
align-items:center;
gap:30px;
box-shadow:0 4px 12px rgba(0,0,0,0.3);
}
.spotify-logo{
display:flex;
align-items:center;
gap:12px;
padding:10px 16px;
border-radius:12px;
background:linear-gradient(135deg,rgba(255,255,255,0.08),rgba(255,255,255,0.02));
border:1px solid rgba(255,255,255,0.15);
text-decoration:none;
}
.spotify-logo i{
color:var(--app-white);
font-size:28px;
filter:drop-shadow(0 2px 4px rgba(255,255,255,0.1));
}
.logo-text{
font-weight:800;
font-size:20px;
letter-spacing:-0.5px;
color:var(--app-white);
line-height:1.2;
}
.logo-subtext{
font-size:11px;
color:var(--app-text-gray);
font-weight:600;
letter-spacing:0.5px;
}
.spotify-nav{
display:flex;
flex-direction:row;
gap:10px;
flex:1;
}
.nav-item{
display:flex;
align-items:center;
gap:8px;
padding:10px 18px;
border-radius:25px;
text-decoration:none;
color:var(--app-text-gray);
transition:all 0.2s ease;
border:1px solid transparent;
white-space:nowrap;
font-size:14px;
font-weight:600;
}
.nav-item i{
font-size:18px;
}
.nav-item:hover{
background:rgba(255,255,255,0.05);
color:var(--app-white);
border-color:rgba(255,255,255,0.1);
transform:translateY(-2px);
}
.nav-item.active{
background:rgba(255,255,255,0.1);
color:var(--app-white);
border-color:rgba(255,255,255,0.3);
font-weight:700;
}
.nav-item.active i{
color:var(--app-white);
filter:drop-shadow(0 0 8px rgba(255,255,255,0.2));
}
.navbar-spacer{
flex:1;
}
.logout-section{
display:flex;
align-items:center;
}
.logout-btn{
display:flex;
align-items:center;
justify-content:center;
gap:8px;
padding:10px 18px;
border-radius:25px;
text-decoration:none;
font-weight:700;
font-size:14px;
color:#ff6b6b;
background:rgba(255,107,107,0.1);
border:1px solid rgba(255,107,107,0.2);
transition:all 0.3s ease;
}
.logout-btn:hover{
background:rgba(255,107,107,0.2);
color:#ff5252;
transform:translateY(-2px);
box-shadow:0 4px 12px rgba(255,107,107,0.2);
}
/* Main Content */
.spotify-content{
padding:30px;
min-height:calc(100vh - var(--navbar-h));
display:flex;
align-items:center;
justify-content:center;
}
/* Mobile Toggle */
.mobile-toggle{
display:none;
background:var(--app-white);
border:none;
border-radius:8px;
width:40px;
height:40px;
align-items:center;
justify-content:center;
color:var(--app-black);
font-weight:800;
transition:all 0.3s ease;
}
.mobile-toggle:hover{
transform:scale(1.05);
background:rgba(255,255,255,0.9);
}
.mobile-menu{
display:none;
position:fixed;
top:var(--navbar-h);
left:0;
right:0;
background:linear-gradient(180deg,var(--app-black)0%,var(--app-dark)40%);
backdrop-filter:blur(10px);
border-bottom:1px solid rgba(255,255,255,0.08);
padding:20px;
z-index:1020;
box-shadow:0 4px 12px rgba(0,0,0,0.3);
}
.mobile-menu.show{
display:block;
}
.mobile-menu .spotify-nav{
flex-direction:column;
}
.mobile-menu .logout-section{
margin-top:15px;
padding-top:15px;
border-top:1px solid rgba(255,255,255,0.1);
}
/* Form Container */
.form-container{
max-width:520px;
width:100%;
margin:0 auto;
animation:slideUp 0.6s ease;
}
@keyframes slideUp{
from{
opacity:0;
transform:translateY(30px);
}
to{
opacity:1;
transform:translateY(0);
}
}
/* Form Card */
.spotify-form-card{
background:linear-gradient(135deg,var(--app-card-bg),rgba(24,24,24,0.6));
backdrop-filter:blur(10px);
border:1px solid rgba(255,255,255,0.08);
border-radius:20px;
overflow:hidden;
box-shadow:
0 15px 35px rgba(0,0,0,0.5),
0 0 0 1px rgba(255,255,255,0.1);
transition:all 0.3s ease;
position:relative;
}
.spotify-form-card:hover{
box-shadow:
0 20px 40px rgba(0,0,0,0.6),
0 0 0 1px rgba(255,255,255,0.2);
transform:translateY(-5px);
}
.spotify-form-card::before{
content:'';
position:absolute;
top:0;
left:0;
right:0;
height:6px;
background:linear-gradient(90deg,var(--app-white),rgba(255,255,255,0.5));
opacity:0.3;
}
.form-header{
background:linear-gradient(135deg,rgba(255,255,255,0.05),rgba(255,255,255,0.02));
padding:25px 30px;
text-align:center;
border-bottom:1px solid rgba(255,255,255,0.1);
}
.form-title{
font-size:28px;
font-weight:800;
margin:0;
color:var(--app-white);
letter-spacing:-0.5px;
}
.form-subtitle{
color:var(--app-text-gray);
font-size:14px;
margin-top:5px;
font-weight:500;
}
.form-body{
padding:30px;
}
/* Form Elements */
.form-group{
margin-bottom:25px;
position:relative;
}
.form-label{
display:block;
color:var(--app-white);
font-weight:600;
font-size:14px;
margin-bottom:10px;
letter-spacing:0.5px;
text-transform:uppercase;
}
.form-label i{
color:var(--app-white);
margin-right:8px;
width:20px;
text-align:center;
}
.spotify-input{
background:rgba(255,255,255,0.05);
border:2px solid rgba(255,255,255,0.1);
border-radius:12px;
color:var(--app-white);
padding:14px 16px;
font-size:16px;
font-family:'Inter',sans-serif;
width:100%;
transition:all 0.3s ease;
}
.spotify-input:focus{
outline:none;
border-color:var(--app-white);
box-shadow:
0 0 0 3px rgba(255,255,255,0.1),
0 0 20px rgba(255,255,255,0.05);
background:rgba(255,255,255,0.08);
transform:translateY(-2px);
}
.spotify-input::placeholder{
color:rgba(179,179,179,0.5);
}
.spotify-textarea{
background:rgba(255,255,255,0.05);
border:2px solid rgba(255,255,255,0.1);
border-radius:12px;
color:var(--app-white);
padding:14px 16px;
font-size:16px;
font-family:'Inter',sans-serif;
width:100%;
min-height:120px;
resize:vertical;
transition:all 0.3s ease;
}
.spotify-textarea:focus{
outline:none;
border-color:var(--app-white);
box-shadow:
0 0 0 3px rgba(255,255,255,0.1),
0 0 20px rgba(255,255,255,0.05);
background:rgba(255,255,255,0.08);
}
/* Button Styles */
.form-actions{
display:flex;
justify-content:space-between;
gap:15px;
margin-top:30px;
padding-top:20px;
border-top:1px solid rgba(255,255,255,0.1);
}
.btn-spotify{
flex:1;
background:linear-gradient(135deg,var(--app-white),rgba(255,255,255,0.9));
border:none;
border-radius:50px;
color:var(--app-black);
font-weight:700;
font-size:16px;
padding:15px;
transition:all 0.3s ease;
text-decoration:none;
display:flex;
align-items:center;
justify-content:center;
gap:10px;
position:relative;
overflow:hidden;
}
.btn-spotify:hover{
transform:translateY(-3px);
box-shadow:0 8px 20px rgba(255,255,255,0.3);
color:var(--app-black);
}
.btn-spotify:active{
transform:translateY(-1px);
}
.btn-spotify::after{
content:'';
position:absolute;
top:0;
left:0;
right:0;
bottom:0;
background:linear-gradient(135deg,transparent 30%,rgba(255,255,255,0.2)50%,transparent 70%);
opacity:0;
transition:opacity 0.3s;
}
.btn-spotify:hover::after{
opacity:1;
}
.btn-spotify-outline{
flex:1;
background:transparent;
border:2px solid rgba(255,255,255,0.2);
border-radius:50px;
color:var(--app-text-gray);
font-weight:700;
font-size:16px;
padding:15px;
transition:all 0.3s ease;
text-decoration:none;
display:flex;
align-items:center;
justify-content:center;
gap:10px;
}
.btn-spotify-outline:hover{
background:rgba(255,255,255,0.05);
color:var(--app-white);
border-color:rgba(255,255,255,0.3);
transform:translateY(-3px);
}
/* Form Validation */
.error-message{
color:#ff6b6b;
font-size:13px;
margin-top:5px;
display:flex;
align-items:center;
gap:5px;
}
.error-message i{
color:#ff6b6b;
}
.success-message{
color:var(--app-white);
font-size:13px;
margin-top:5px;
display:flex;
align-items:center;
gap:5px;
}
/* Form Animation */
@keyframes pulse{
0%{
box-shadow:0 0 0 0 rgba(255,255,255,0.2);
}
70%{
box-shadow:0 0 0 10px rgba(255,255,255,0);
}
100%{
box-shadow:0 0 0 0 rgba(255,255,255,0);
}
}
.spotify-form-card{
animation:pulse 2s infinite;
}
/* Responsive Design */
@media(max-width:991.98px){
.spotify-navbar{
padding:0 20px;
}
.spotify-nav,
.logout-section{
display:none;
}
.mobile-toggle{
display:flex;
}
.spotify-content{
padding:20px;
}
.form-container{
max-width:100%;
}
.form-actions{
flex-direction:column;
}
.btn-spotify,
.btn-spotify-outline{
width:100%;
}
}
@media(max-width:768px){
.form-header{
padding:20px;
}
.form-title{
font-size:24px;
}
.form-body{
padding:20px;
}
.spotify-input,
.spotify-textarea{
padding:12px 14px;
font-size:15px;
}
}
/* Character Count */
.char-count{
position:absolute;
right:15px;
top:42px;
color:var(--app-text-gray);
font-size:12px;
font-weight:500;
}
/* Loading State */
.loading{
position:relative;
color:transparent !important;
}
.loading::after{
content:'';
position:absolute;
top:50%;
left:50%;
width:20px;
height:20px;
margin:-10px 0 0 -10px;
border:2px solid rgba(0,0,0,0.2);
border-top-color:var(--app-black);
border-radius:50%;
animation:spin 0.6s linear infinite;
}
@keyframes spin{
to{ transform:rotate(360deg);}
}
</style>
</head>
<body>
<!-- Navbar -->
<nav class="spotify-navbar">
<a href="<?= base_url('/dashboard')?>" class="spotify-logo">
<i class="bi bi-box-seam"></i>
<div>
<div class="logo-text">Inventory</div>
<div class="logo-subtext">Product Management</div>
</div>
</a>
<div class="spotify-nav">
<a class="nav-item" href="<?= base_url('/dashboard')?>">
<i class="bi bi-table"></i>
<span>Products Table</span>
</a>
<a class="nav-item" href="<?= base_url('products/cards')?>">
<i class="bi bi-grid-3x3-gap-fill"></i>
<span>Product Cards</span>
</a>
<a class="nav-item active" href="<?= base_url('product/productForm')?>">
<i class="bi bi-plus-circle-fill"></i>
<span>Add Product</span>
</a>
</div>
<div class="navbar-spacer"></div>
<div class="logout-section">
<a href="<?= base_url('/logout')?>"
class="logout-btn"
onclick="return confirm('Are you sure you want to logout?');">
<i class="bi bi-box-arrow-right"></i>
<span>Logout</span>
</a>
</div>
<button class="mobile-toggle" type="button" id="mobileToggle">
<i class="bi bi-list"></i>
</button>
</nav>
<!-- Mobile Menu -->
<div class="mobile-menu" id="mobileMenu">
<nav class="spotify-nav">
<a class="nav-item" href="<?= base_url('/dashboard')?>">
<i class="bi bi-table"></i>
<span>Products Table</span>
</a>
<a class="nav-item" href="<?= base_url('products/cards')?>">
<i class="bi bi-grid-3x3-gap-fill"></i>
<span>Product Cards</span>
</a>
<a class="nav-item active" href="<?= base_url('product/productForm')?>">
<i class="bi bi-plus-circle-fill"></i>
<span>Add Product</span>
</a>
</nav>
<div class="logout-section">
<a href="<?= base_url('/logout')?>"
class="logout-btn"
onclick="return confirm('Are you sure you want to logout?');">
<i class="bi bi-box-arrow-right"></i>
<span>Logout</span>
</a>
</div>
</div>
<!-- Main Content -->
<main class="spotify-content">
<div class="form-container">
<div class="spotify-form-card">
<div class="form-header">
<h2 class="form-title">Add New Product</h2>
<p class="form-subtitle">Fill in the details to add a new product to your inventory</p>
</div>
<div class="form-body">
<form action="<?= site_url('products/store')?>" method="post" id="productForm">
<?= csrf_field()?>
<div class="form-group">
<label for="product_name" class="form-label">
<i class="bi bi-tag-fill"></i>Product Name
</label>
<input type="text"
name="product_name"
id="product_name"
class="spotify-input"
placeholder="Enter product name"
required
autocomplete="off"
autofocus>
<div class="error-message" id="nameError" style="display:none;">
<i class="bi bi-exclamation-circle"></i> Product name is required
</div>
</div>
<div class="form-group">
<label for="description" class="form-label">
<i class="bi bi-file-text-fill"></i>Description
</label>
<textarea name="description"
id="description"
class="spotify-textarea"
placeholder="Enter product description"
rows="4"
maxlength="500"></textarea>
<div class="char-count" id="charCount">0/500</div>
</div>
<div class="form-group">
<label for="price" class="form-label">
<i class="bi bi-currency-exchange"></i>Price(₱)
</label>
<input type="number"
step="0.01"
name="price"
id="price"
class="spotify-input"
placeholder="0.00"
min="0"
required>
<div class="error-message" id="priceError" style="display:none;">
<i class="bi bi-exclamation-circle"></i> Please enter a valid price
</div>
</div>
<div class="form-actions">
<a href="<?= site_url('/dashboard')?>" class="btn-spotify-outline">
<i class="bi bi-arrow-left"></i>Back
</a>
<button type="submit" class="btn-spotify" id="submitBtn">
<i class="bi bi-check-circle-fill"></i>Save Product
</button>
</div>
</form>
</div>
</div>
</div>
</main>
<script>
document.addEventListener('DOMContentLoaded',function(){
// Mobile menu toggle
const mobileMenu = document.getElementById('mobileMenu');
const toggle = document.getElementById('mobileToggle');
if(toggle){
toggle.addEventListener('click',()=>{
mobileMenu.classList.toggle('show');
toggle.innerHTML = mobileMenu.classList.contains('show')
? '<i class="bi bi-x-lg"></i>'
:'<i class="bi bi-list"></i>';
});
}
// Character counter for description
const description = document.getElementById('description');
const charCount = document.getElementById('charCount');
if(description && charCount){
description.addEventListener('input',function(){
const length = this.value.length;
charCount.textContent = `${length}/500`;
if(length > 450){
charCount.style.color = '#ff6b6b';
}else if(length > 400){
charCount.style.color = '#ffd166';
}else{
charCount.style.color = 'var(--app-text-gray)';
}
});
}
// Form validation
const form = document.getElementById('productForm');
const nameInput = document.getElementById('product_name');
const priceInput = document.getElementById('price');
const nameError = document.getElementById('nameError');
const priceError = document.getElementById('priceError');
const submitBtn = document.getElementById('submitBtn');
if(form){
form.addEventListener('submit',function(e){
let isValid = true;
// Validate product name
if(!nameInput.value.trim()){
nameError.style.display = 'flex';
nameInput.style.borderColor = '#ff6b6b';
isValid = false;
}else{
nameError.style.display = 'none';
nameInput.style.borderColor = 'rgba(255,255,255,0.1)';
}
// Validate price
const price = parseFloat(priceInput.value);
if(isNaN(price)|| price < 0){
priceError.style.display = 'flex';
priceInput.style.borderColor = '#ff6b6b';
isValid = false;
}else{
priceError.style.display = 'none';
priceInput.style.borderColor = 'rgba(255,255,255,0.1)';
}
if(!isValid){
e.preventDefault();
return;
}
// Show loading state
submitBtn.classList.add('loading');
submitBtn.disabled = true;
// Add a small delay to show the loading state
setTimeout(()=>{
if(!form.checkValidity()){
submitBtn.classList.remove('loading');
submitBtn.disabled = false;
}
},2000);
});
}
// Real-time validation
nameInput.addEventListener('input',function(){
if(this.value.trim()){
nameError.style.display = 'none';
this.style.borderColor = 'rgba(255,255,255,0.1)';
}
});
priceInput.addEventListener('input',function(){
const price = parseFloat(this.value);
if(!isNaN(price)&& price >= 0){
priceError.style.display = 'none';
this.style.borderColor = 'rgba(255,255,255,0.1)';
}
});
// Add focus effects
const inputs = [nameInput,description,priceInput];
inputs.forEach(input =>{
if(input){
input.addEventListener('focus',function(){
this.parentElement.style.transform = 'translateY(-2px)';
});
input.addEventListener('blur',function(){
this.parentElement.style.transform = 'translateY(0)';
});
}
});
// Price formatting
priceInput.addEventListener('blur',function(){
const value = parseFloat(this.value);
if(!isNaN(value)){
this.value = value.toFixed(2);
}
});
// Prevent negative values in price
priceInput.addEventListener('keydown',function(e){
if(e.key === '-' || e.key === 'e' || e.key === 'E'){
e.preventDefault();
}
});
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>