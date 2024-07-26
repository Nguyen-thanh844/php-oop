<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>Trang chủ</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

 <div class="container">
 <div class="row">
 <h1>Welcome <?php echo \htmlentities($name??'', ENT_QUOTES, 'UTF-8', false); ?> to my website!</h1>

 <nav>
 <?php if(!is_logged()): ?>
 <a class="btn btn-primary" href="<?php echo \htmlentities(url('auth/login')??'', ENT_QUOTES, 'UTF-8', false); ?>">Login</a>
 <?php endif; ?>

 <?php if(is_logged()): ?>
 <a class="btn btn-danger" href="<?php echo \htmlentities(url('auth/logout')??'', ENT_QUOTES, 'UTF-8', false); ?>">Logout</a>
 <?php endif; ?>
 </nav>
 </div>
 </div>

</body>

</html>