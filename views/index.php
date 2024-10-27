

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocery Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('../assets/background.svg');
            background-position: center;
            background-size: cover;
        }

        .search-container {
            background-image: url("../assets/background.svg");
            padding: 20px;
        }
        .category-card {
            border: none;
            border-radius: 15px;
            transition: transform 0.2s;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .category-card:hover {
            transform: translateY(-5px);
        }
        .category-img {
            height: 150px;
            object-fit: cover;
            border-radius: 15px;
        }
        .promo-card {
            background-color: #2e7d32;
            color: white;
            border-radius: 15px;
        }
        
        .nav-icon {
            color: #666;
            text-decoration: none;
            font-size: 1.2rem;
        }
        .nav-icon.active {
            color: #2e7d32;
        }

        .bottom-nav {
            position: fixed;
            bottom: 0;
            width: 100%;
            background: white;
            border-top: 1px solid #ddd;
            padding: 10px 0;
            z-index: 1000;
        }

        .icon-container {
            display: flex;
            justify-content: space-evenly;
        }

        .nav-icon {
            color: #666;
            text-decoration: none;
            font-size: 1.2rem;
        }

        .nav-icon.active {
            color: #2e7d32; 
        }
    </style>
</head>
<body>
    <!-- Search Bar -->
    <div class="search-container">
    <div class="input-group">
        <input type="text" class="form-control" id="searchInput" placeholder="Search for products">
        <button class="btn btn-outline-secondary" type="button">
            <i class="fas fa-search"></i>
        </button>
    </div>
    <div class="search-results-container">
        <div id="searchResults"></div>
    </div>
</div>

    <!-- Main Content -->
    <div class="container mb-5 pb-5">
        <!-- Top Picks Section -->
        <h5 class="mt-4 mb-3">TODAY'S TOP PICKS!</h5>
        
        <!-- Categories -->
        <div class="row g-3">
            <!-- Vegetables Category -->
            <div class="col-12">
                <div class="card category-card">
                    <div class="card-body">
                        <h6>Vegetables</h6>
                        <img src="../assets/vegetables.jpg" alt="Vegetables" class="img-fluid category-img w-100">
                    </div>
                </div>
            </div>
            
            <!-- Fruits Category -->
            <div class="col-6">
                <div class="card category-card">
                    <div class="card-body">
                        <h6>Fruits</h6>
                        <img src="../assets/fruits.jpg" alt="Fruits" class="img-fluid category-img">
                    </div>
                </div>
            </div>
            
            <!-- Meat Category -->
            <div class="col-6">
                <div class="card category-card">
                    <div class="card-body">
                        <h6>Meat</h6>
                        <img src="../assets/meat.jpg" alt="Meat" class="img-fluid category-img">
                    </div>
                </div>
            </div>
        </div>

        <!-- Promotions Section -->
        <h5 class="mt-4 mb-3">PROMOS FOR YOU!</h5>
        <div class="card promo-card">
            <div class="card-body">
                <h4>GET HEALTHY!</h4>
                <h2 class="display-6">25% OFF</h2>
                <p>FRUITS and VEGETABLES!</p>
                <small>*for every 10kg of purchase</small>
            </div>
        </div>
    </div>

    <?php include './components/bottom-nav.php'; ?>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/search.js"></script>
</body>
</html>