<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>FoodWagon</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&family=Open+Sans:wght@400;600;700&display=swap"
        rel="stylesheet">
    
    <!-- Font Awesome 5 Free (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../public/css/TopNap_Header.css">
    <link rel="stylesheet" href="../public/css/FLASH.css">
    <link rel="stylesheet" href="../public/css/HowDoes.css">
    <link rel="stylesheet" href="../public/css/POP.css">
    <link rel="stylesheet" href="../public/css/fr.css">
    <link rel="stylesheet" href="../public/css/details.css">
    <link rel="stylesheet" href="../public/css/CTA-FOOTER.css">
    <link rel="stylesheet" href="../public/css/SFARES.css">
    <link rel="stylesheet" href="../public/css/logstyle.css">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
</head>

<body>
    <main class="page-container">

        <!--Top Nav + Header-->
        <header class="top-nav-header">
            <div class="container">
                <!--Top Nav-->
                <div class="top-nav">
        
                    <!--Logo-->
                    <div class="logofoodwagon">
        
                        <!--Mask group-->
                        <div class="logo">
                            <img src="../public/images/Mask Group.png" alt="logo">
                        </div>
        
                        <!--Frame 36-->
                        <div class="frame36">
                            <span class="food">food<span class="wagon">wagon</span></span>
                        </div>
        
                    </div>
        
                    <!--Deliver Address-->
                    <div class="deliver-address">
                        <div>
                            <p>Deliver to:</p>
                        </div>
        
                        <!--Frame 61-->
                        <div class="frame61">
                            <div>
                                <img src="../public/images/map-marker-alt.png" alt="location">
                            </div>
        
                            <!--Frame 63-->
                            <div class="frame63">
                                <span class="current">Current Location </span>
                                <span>Mohammadpur Bus Stand, Dhaka</span>
                            </div>
                        </div>
        
                    </div>
        
                    <!--Search + Login button-->
                    <div class="search-login-button">
                        <!--Frame 39-->
                        <div class="frame39">
                            <span class="icon-search"><img src="../public/images/Search.png"
                                    alt="icon search"></span>
                            <span class="search-food">Search Food</span>
                        </div>
        

                        <div class="header-user">
                          <div class="user-avatar" onclick="toggleSidebar()">
                              <img src="../public/uploads/<?= htmlspecialchars($user['profile_picture']) ?>" 
                                    alt="User" 
                                    onerror="this.src='../public/uploads/default.png'">
                          </div>
                        </div>

                         <!-- Message de erreur -->
                        <?php if (!empty($error)) : ?>
                            <div class="error-message"><?= htmlspecialchars($error) ?></div>
                        <?php endif; ?>

                        
                        <!-- Sidebar cachée par défaut -->
                        <aside id="sidebar" class="sidebar hidden">
                            <button class="close-btn" onclick="toggleSidebar()">✖</button>
                            <img id="profilePic" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Profil" title="Clique pour changer ta photo">

                            <h3><?= htmlspecialchars($user['name']) ?></h3>
                            <p><?= htmlspecialchars($user['email']) ?></p>

                            <form action="../controllers/UserControllerc.php?action=uploadProfilePicture" method="POST" enctype="multipart/form-data">
                              <label for="profile_picture"></label>
                              <input type="file" name="profile_picture" id="profile_picture" accept="image/*" onchange="this.form.submit()">
                            </form>
                            <button id="disconnect">Disconnect</button>
                        </aside>
        
                    </div>
        
                </div>


                <!--Header-->
                <div class="header">

                    <!--Background-->
                    <div class="background-jaune">

                        <!--Title + Order card-->
                        <div class="title-order-card">
                            <!--Title-->
                            <div class="title">
                                <h1>Are you starving?</h1>
                                <p>Within a few clicks, find meals that are accessible near you</p>
                            </div>
                        
                            <!--Order card-->
                            <div class="order-card">
                        
                                <!--Top-->
                                <div class="Top">
                        
                                    <!--Tab 1-->
                                    <div class="tab">
                                        <button class="tab1">
                                            <span><img src="../public/images/moto.png" alt="Icone moto"></span>
                                            <span>Delivery</span>
                                        </button>
                                    
                                        <!--Tab 2-->
                                    
                                        <button class="tab2">
                                            <span><img src="../public/images/sac.png" alt="Icone sac">Pickup</span>
                                        </button>
                                    </div>
                                   
                        
                                </div>
                        
                        
                                <!--HR-->
                        
                        
                                <!--Bottom-->
                                <div class="bottom">
                                    <!--Text field + Button-->
                                    <div class="text-field-button">
                                        <!--Text field-->
                                        <button class="text-field">
                                            <span><img src="../public/images/map.png" alt="Icone map"></span>
                                            <input type="text" placeholder="Enter Your Address">
                                        </button>
                        
                                        <!--Button-->
                                        <button class="find-food-btn">
                                            <span><img src="../public/images/recherche.png" alt="Icone Search"> Find
                                                Food</span>
                                        </button>
                        
                                    </div>
                                </div>
                        
                            </div>
                        
                        </div>
                        
                        <!--Image-->
                        <div class="noodle">
                            <img src="../public/images/Image Base.png" alt="Nouilles">
                        </div>
                        
                    </div>
                    
                </div>
        
            </div>
        
        </header>

        <?php 
           include __DIR__ . '/../static.php';
        ?>
    </main>

    <script src="./FooDa/logWithMVC/public/js/user.js"></script>
</body>

</html>


