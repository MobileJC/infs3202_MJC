<html>

<head>
    <title>INFS3202 Asm</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
</head>



<script>
    // Show select image using file input.
    function readURL(input) {
                $('#default_img').show();
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#select')
                            .attr('src', e.target.result)
                            .width(300)
                            .height(200);

                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }

    
</script>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">INFS3202 Asm</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>login"> Home </a>
                </li>
            </ul>
            <ul class="navbar-nav my-lg-0">

        </div>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="searchInput">
            <button class="btn btn-outline-success my-2 my-sm-0" type="button" onclick="search()">Search</button>
        </form>
        <?php if (session()->get('username')) { ?>
            <a class="mx-4" href="<?php echo base_url(); ?>user_profile"> User Profile </a>
            <a class="mx-4" href="<?php echo base_url(); ?>login/logout"> Logout </a>
        <?php } else { ?>
            <a class="mx-4" href="<?php echo base_url(); ?>login"> Login </a>
        <?php } ?>
    </nav>

</body>

</html>