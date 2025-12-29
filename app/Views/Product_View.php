<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Product List | Inventory Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    :root{--app-black:#000;--app-dark:#121212;--app-gray:#181818;--app-white:#FFF;--app-text-gray:#B3B3B3;--app-card-bg:rgba(24,24,24,0.8);--navbar-h:70px}
    body{background:linear-gradient(180deg,var(--app-black) 0%,var(--app-dark) 100%)!important;color:var(--app-white)!important;font-family:'Inter',-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;min-height:100vh;margin:0;padding:var(--navbar-h) 0 0}
    .spotify-navbar{position:fixed;top:0;left:0;right:0;height:var(--navbar-h);background:linear-gradient(180deg,var(--app-black) 0%,var(--app-dark) 40%);backdrop-filter:blur(10px);border-bottom:1px solid rgba(255,255,255,0.08);padding:0 30px;z-index:1030;display:flex;align-items:center;gap:30px;box-shadow:0 4px 12px rgba(0,0,0,0.3)}
    .spotify-logo{display:flex;align-items:center;gap:12px;padding:10px 16px;border-radius:12px;background:linear-gradient(135deg,rgba(255,255,255,0.15),rgba(255,255,255,0.05));border:1px solid rgba(255,255,255,0.2);text-decoration:none}
    .spotify-logo i{color:var(--app-white);font-size:28px;filter:drop-shadow(0 2px 4px rgba(255,255,255,0.3))}
    .logo-text{font-weight:800;font-size:20px;letter-spacing:-0.5px;background:linear-gradient(45deg,var(--app-white),var(--app-white));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;line-height:1.2}
    .logo-subtext{font-size:11px;color:var(--app-text-gray);font-weight:600;letter-spacing:0.5px}
    .spotify-nav{display:flex;gap:10px;flex:1}
    .nav-item{display:flex;align-items:center;gap:8px;padding:10px 18px;border-radius:25px;text-decoration:none;color:var(--app-text-gray);transition:all 0.2s;border:1px solid transparent;white-space:nowrap;font-size:14px;font-weight:600}
    .nav-item i{font-size:18px}
    .nav-item:hover{background:rgba(255,255,255,0.05);color:var(--app-white);border-color:rgba(255,255,255,0.1);transform:translateY(-2px)}
    .nav-item.active{background:rgba(255,255,255,0.1);color:var(--app-white);border-color:rgba(255,255,255,0.3);font-weight:700}
    .nav-item.active i{filter:drop-shadow(0 0 8px rgba(255,255,255,0.4))}
    .navbar-spacer{flex:1}
    .logout-btn{display:flex;align-items:center;gap:8px;padding:10px 18px;border-radius:25px;text-decoration:none;font-weight:700;font-size:14px;color:#ff6b6b;background:rgba(255,107,107,0.1);border:1px solid rgba(255,107,107,0.2);transition:all 0.3s}
    .logout-btn:hover{background:rgba(255,107,107,0.2);color:#ff5252;transform:translateY(-2px);box-shadow:0 4px 12px rgba(255,107,107,0.2)}
    .spotify-content{padding:30px;min-height:calc(100vh - var(--navbar-h))}
    .mobile-toggle{display:none;background:var(--app-white);border:none;border-radius:8px;width:40px;height:40px;align-items:center;justify-content:center;color:var(--app-black);font-weight:800;transition:all 0.3s}
    .mobile-toggle:hover{transform:scale(1.05)}
    .mobile-menu{display:none;position:fixed;top:var(--navbar-h);left:0;right:0;background:linear-gradient(180deg,var(--app-black) 0%,var(--app-dark) 40%);backdrop-filter:blur(10px);border-bottom:1px solid rgba(255,255,255,0.08);padding:20px;z-index:1020;box-shadow:0 4px 12px rgba(0,0,0,0.3)}
    .mobile-menu.show{display:block}
    .mobile-menu .spotify-nav{flex-direction:column}
    .mobile-menu .logout-section{margin-top:15px;padding-top:15px;border-top:1px solid rgba(255,255,255,0.1)}
    .page-header{margin-bottom:30px;padding-bottom:20px;border-bottom:1px solid rgba(255,255,255,0.1)}
    .page-title{font-size:32px;font-weight:800;margin:0;background:linear-gradient(45deg,var(--app-white),var(--app-white));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text}
    .stats-card{background:linear-gradient(135deg,var(--app-card-bg),rgba(24,24,24,0.6));backdrop-filter:blur(10px);border:1px solid rgba(255,255,255,0.08);border-radius:16px;padding:20px;transition:all 0.3s;position:relative;overflow:hidden}
    .stats-card::before{content:'';position:absolute;top:0;left:0;right:0;height:4px;background:linear-gradient(90deg,var(--app-white),rgba(255,255,255,0.9));opacity:0.8}
    .stats-card:hover{transform:translateY(-4px);border-color:rgba(255,255,255,0.3);box-shadow:0 8px 20px rgba(0,0,0,0.4)}
    .stats-number{font-size:32px;font-weight:800;color:var(--app-white);margin:0;line-height:1}
    .stats-label{color:var(--app-text-gray);font-size:14px;font-weight:600;letter-spacing:0.5px;margin-top:4px}
    .spotify-search{background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:50px;overflow:hidden}
    .spotify-search input{background:transparent;border:none;color:var(--app-white);padding:12px 20px;font-size:14px;width:100%}
    .spotify-search input:focus{outline:none;box-shadow:none}
    .spotify-search input::placeholder{color:var(--app-text-gray)}
    .search-btn,.clear-btn{border:none;cursor:pointer;transition:all 0.3s}
    .search-btn{background:var(--app-white);color:var(--app-black);padding:0 20px;font-weight:700}
    .search-btn:hover{background:rgba(255,255,255,0.9)}
    .clear-btn{background:transparent;color:var(--app-text-gray);padding:0 15px}
    .clear-btn:hover{color:var(--app-white)}
    .btn-spotify{background:linear-gradient(135deg,var(--app-white),rgba(255,255,255,0.8));border:none;border-radius:50px;color:var(--app-black);font-weight:700;font-size:14px;padding:12px 24px;transition:all 0.3s;text-decoration:none;display:inline-flex;align-items:center;gap:8px}
    .btn-spotify:hover{transform:translateY(-2px);box-shadow:0 4px 12px rgba(255,255,255,0.4);color:var(--app-black)}
    .spotify-alert{background:rgba(24,24,24,0.9);backdrop-filter:blur(10px);border:1px solid rgba(255,255,255,0.1);border-radius:12px;color:var(--app-white);padding:16px 20px;margin-bottom:20px;animation:slideIn 0.3s}
    .alert-success{border-left:4px solid var(--app-white);background:rgba(255,255,255,0.1)}
    .alert-danger{border-left:4px solid #ff6b6b;background:rgba(255,107,107,0.1)}
    .alert-warning{border-left:4px solid #ffd166;background:rgba(255,209,102,0.1)}
    .alert-info{border-left:4px solid #118ab2;background:rgba(17,138,178,0.1)}
    @keyframes slideIn{from{opacity:0;transform:translateY(-10px)}to{opacity:1;transform:translateY(0)}}
    .spotify-table-container{background:linear-gradient(135deg,var(--app-card-bg),rgba(24,24,24,0.6));backdrop-filter:blur(10px);border:1px solid rgba(255,255,255,0.08);border-radius:16px;overflow:hidden;margin-top:20px}
    .spotify-table{width:100%;color:var(--app-white);border-collapse:separate;border-spacing:0}
    .spotify-table thead{background:rgba(40,40,40,0.9)}
    .spotify-table th{padding:16px;text-align:left;font-weight:700;color:var(--app-text-gray);border-bottom:1px solid rgba(255,255,255,0.1);text-transform:uppercase;font-size:12px;letter-spacing:1px}
    .spotify-table td{padding:16px;border-bottom:1px solid rgba(255,255,255,0.05);vertical-align:middle}
    .spotify-table tbody tr{transition:all 0.2s}
    .spotify-table tbody tr:hover{background:rgba(255,255,255,0.05);transform:translateX(4px)}
    .price-cell{font-weight:700;color:var(--app-white)}
    .date-cell{color:var(--app-text-gray);font-size:13px}
    .action-buttons{display:flex;gap:8px}
    .btn-table{padding:6px 12px;font-size:12px;font-weight:700;border-radius:20px;border:none;cursor:pointer;transition:all 0.3s;display:inline-flex;align-items:center;gap:4px;text-decoration:none}
    .btn-edit{background:linear-gradient(135deg,var(--app-white),rgba(255,255,255,0.8));color:var(--app-black)}
    .btn-delete{background:linear-gradient(135deg,#ff6b6b,#ff5252);color:white}
    .btn-table:hover{transform:translateY(-2px);box-shadow:0 2px 8px rgba(0,0,0,0.3)}
    .spotify-pagination{display:flex;justify-content:center;gap:8px;margin-top:20px}
    .page-link{background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);color:var(--app-text-gray);padding:8px 16px;border-radius:20px;text-decoration:none;transition:all 0.3s;font-weight:600;font-size:14px}
    .page-link:hover{background:rgba(255,255,255,0.2);color:var(--app-white);border-color:rgba(255,255,255,0.3)}
    .page-link.active{background:linear-gradient(135deg,var(--app-white),rgba(255,255,255,0.8));color:var(--app-black);border-color:var(--app-white)}
    .page-link.disabled{opacity:0.5;cursor:not-allowed}
    .empty-state{text-align:center;padding:40px 20px;color:var(--app-text-gray)}
    .empty-state i{font-size:48px;margin-bottom:16px;opacity:0.5}
    @media (max-width:991.98px){.spotify-navbar{padding:0 20px}.spotify-nav,.logout-section{display:none}.mobile-toggle{display:flex}.spotify-content{padding:20px}.spotify-table{display:block;overflow-x:auto}.action-buttons{flex-direction:column;gap:4px}}
    @media (max-width:768px){.page-title{font-size:24px}.stats-card{margin-bottom:15px}}
  </style>
</head>
<body>
  <nav class="spotify-navbar">
    <a href="<?= base_url('/dashboard') ?>" class="spotify-logo"><i class="bi bi-box-seam"></i><div><div class="logo-text">Inventory</div><div class="logo-subtext">Product Management</div></div></a>
    <div class="spotify-nav">
      <a class="nav-item active" href="<?= base_url('/dashboard') ?>"><i class="bi bi-table"></i><span>Products Table</span></a>
      <a class="nav-item" href="<?= base_url('products/cards') ?>"><i class="bi bi-grid-3x3-gap-fill"></i><span>Product Cards</span></a>
      <a class="nav-item" href="<?= base_url('product/productForm') ?>"><i class="bi bi-plus-circle-fill"></i><span>Add Product</span></a>
    </div>
    <div class="navbar-spacer"></div>
    <div class="logout-section"><a href="<?= base_url('/logout') ?>" class="logout-btn" onclick="return confirm('Are you sure you want to logout?');"><i class="bi bi-box-arrow-right"></i><span>Logout</span></a></div>
    <button class="mobile-toggle" type="button" id="mobileToggle"><i class="bi bi-list"></i></button>
  </nav>
  <div class="mobile-menu" id="mobileMenu">
    <nav class="spotify-nav">
      <a class="nav-item active" href="<?= base_url('/dashboard') ?>"><i class="bi bi-table"></i><span>Products Table</span></a>
      <a class="nav-item" href="<?= base_url('products/cards') ?>"><i class="bi bi-grid-3x3-gap-fill"></i><span>Product Cards</span></a>
      <a class="nav-item" href="<?= base_url('product/productForm') ?>"><i class="bi bi-plus-circle-fill"></i><span>Add Product</span></a>
    </nav>
    <div class="logout-section"><a href="<?= base_url('/logout') ?>" class="logout-btn" onclick="return confirm('Are you sure you want to logout?');"><i class="bi bi-box-arrow-right"></i><span>Logout</span></a></div>
  </div>
  <main class="spotify-content">
    <div class="container-fluid">
      <div class="page-header"><h1 class="page-title">Product List</h1></div>
      <div class="row mb-4">
        <div class="col-lg-4 col-md-6 mb-4"><div class="stats-card"><div class="d-flex align-items-center"><div class="me-3"><i class="bi bi-box" style="font-size:2rem;color:var(--app-white)"></i></div><div><h3 class="stats-number"><?= $totalProducts ?></h3><p class="stats-label">Total Products</p></div></div></div></div>
        <div class="col-lg-5 col-md-6 mb-4"><div class="spotify-search d-flex align-items-center"><input type="text" class="form-control border-0" placeholder="Search products..." id="searchInput"><button class="clear-btn" type="button" id="clearBtn" title="Clear search"><i class="bi bi-x"></i></button><button class="search-btn" type="button" id="searchBtn"><i class="bi bi-search"></i></button></div></div>
        <div class="col-lg-3 col-md-12 mb-4 text-lg-end"><a href="<?= base_url('product/productForm') ?>" class="btn-spotify"><i class="bi bi-plus-circle"></i> Add Product</a></div>
      </div>
      <?php if(session()->has('message')):?><div class="spotify-alert alert-success alert-dismissible fade show"><i class="bi bi-check-circle-fill me-2"></i><?= session('message') ?><button type="button" class="btn-close" data-bs-dismiss="alert" style="filter:invert(1)"></button></div><?php endif;?>
      <?php if(session()->has('error')):?><div class="spotify-alert alert-danger alert-dismissible fade show"><i class="bi bi-exclamation-circle-fill me-2"></i><?= session('error') ?><button type="button" class="btn-close" data-bs-dismiss="alert" style="filter:invert(1)"></button></div><?php endif;?>
      <?php if(session()->has('warning')):?><div class="spotify-alert alert-warning alert-dismissible fade show"><i class="bi bi-exclamation-triangle-fill me-2"></i><?= session('warning') ?><button type="button" class="btn-close" data-bs-dismiss="alert" style="filter:invert(1)"></button></div><?php endif;?>
      <?php if(session()->has('info')):?><div class="spotify-alert alert-info alert-dismissible fade show"><i class="bi bi-info-circle-fill me-2"></i><?= session('info') ?><button type="button" class="btn-close" data-bs-dismiss="alert" style="filter:invert(1)"></button></div><?php endif;?>
      <div class="spotify-table-container"><div class="table-responsive"><table class="spotify-table"><thead><tr><th>Product Name</th><th>Description</th><th>Price (₱)</th><th>Created At</th><th>Updated At</th><th>Actions</th></tr></thead><tbody>
      <?php if(!empty($products)&&is_array($products)):foreach($products as $product):?>
      <tr><td><?= esc($product['product_name']) ?></td><td><?= esc($product['description']) ?></td><td class="price-cell">₱ <?= number_format($product['price'],2) ?></td><td class="date-cell"><?= date('M d, Y',strtotime($product['created_at'])) ?></td><td class="date-cell"><?= date('M d, Y',strtotime($product['updated_at'])) ?></td><td><div class="action-buttons"><a href="<?= base_url('products/edit/'.$product['id']) ?>" class="btn-table btn-edit"><i class="bi bi-pencil"></i> Edit</a><a href="<?= base_url('products/delete/'.$product['id']) ?>" class="btn-table btn-delete" onclick="return confirm('Are you sure you want to delete this product?');"><i class="bi bi-trash"></i> Delete</a></div></td></tr>
      <?php endforeach;else:?>
      <tr><td colspan="6" class="empty-state"><i class="bi bi-music-note-beamed"></i><p>No products found</p></td></tr>
      <?php endif;?>
      </tbody></table></div></div>
      <?php if($totalPages>1):?>
      <div class="mt-4"><div class="spotify-pagination">
      <?php if($currentPage>1):?><a href="<?= base_url('?page='.($currentPage-1)) ?>" class="page-link"><i class="bi bi-chevron-left"></i></a><?php else:?><span class="page-link disabled"><i class="bi bi-chevron-left"></i></span><?php endif;?>
      <?php for($i=1;$i<=$totalPages;$i++):if($i==$currentPage):?><span class="page-link active"><?= $i ?></span><?php else:?><a href="<?= base_url('?page='.$i) ?>" class="page-link"><?= $i ?></a><?php endif;endfor;?>
      <?php if($currentPage<$totalPages):?><a href="<?= base_url('?page='.($currentPage+1)) ?>" class="page-link"><i class="bi bi-chevron-right"></i></a><?php else:?><span class="page-link disabled"><i class="bi bi-chevron-right"></i></span><?php endif;?>
      </div><div class="text-center mt-3"><p style="color:var(--app-text-gray);font-size:14px">Showing <?= (($currentPage-1)*$perPage)+1 ?> to <?= min($currentPage*$perPage,$totalProducts) ?> of <?= $totalProducts ?> products</p></div></div>
      <?php endif;?>
    </div>
  </main>
  <script>
  document.addEventListener('DOMContentLoaded',function(){const mobileMenu=document.getElementById('mobileMenu'),toggle=document.getElementById('mobileToggle');if(toggle){toggle.addEventListener('click',()=>{mobileMenu.classList.toggle('show');toggle.innerHTML=mobileMenu.classList.contains('show')?'<i class="bi bi-x-lg"></i>':'<i class="bi bi-list"></i>'});}const searchInput=document.getElementById('searchInput'),searchBtn=document.getElementById('searchBtn'),clearBtn=document.getElementById('clearBtn'),tableRows=document.querySelectorAll('tbody tr'),noProductsRow=document.querySelector('tbody tr td[colspan]');let originalNoProductsMessage='';if(noProductsRow){originalNoProductsMessage=noProductsRow.innerHTML;}function performSearch(){const searchTerm=searchInput.value.toLowerCase().trim();let visibleRows=0;tableRows.forEach(row=>{if(row.querySelector('td[colspan]'))return;const cells=row.querySelectorAll('td');let rowText='';cells.forEach((cell,index)=>{if(index<3){rowText+=cell.textContent.toLowerCase()+' ';}});if(searchTerm===''||rowText.includes(searchTerm)){row.style.display='';visibleRows++;}else{row.style.display='none';}});if(searchTerm!==''&&visibleRows===0){if(noProductsRow){noProductsRow.innerHTML='<i class="bi bi-search"></i><p>No products found matching your search.</p>';noProductsRow.parentElement.style.display='';}}else if(searchTerm===''||visibleRows>0){if(noProductsRow){if(searchTerm==='')noProductsRow.innerHTML=originalNoProductsMessage;if(visibleRows>0)noProductsRow.parentElement.style.display='none';}}}function clearSearch(){searchInput.value='';performSearch();searchInput.focus();}searchBtn.addEventListener('click',performSearch);clearBtn.addEventListener('click',clearSearch);searchInput.addEventListener('input',performSearch);searchInput.addEventListener('keypress',function(e){if(e.key==='Enter'){e.preventDefault();performSearch();}});const tableRowsAll=document.querySelectorAll('.spotify-table tbody tr');tableRowsAll.forEach(row=>{row.addEventListener('mouseenter',function(){this.style.transform='translateX(4px)';});row.addEventListener('mouseleave',function(){this.style.transform='translateX(0)';});});const alerts=document.querySelectorAll('.spotify-alert');alerts.forEach(alert=>{setTimeout(()=>{const bsAlert=new bootstrap.Alert(alert);bsAlert.close();},5000);});});
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>