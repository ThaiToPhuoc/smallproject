<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      
</head>
  <body>
        <div id="wrapper"> 

        <div id="header">
            <?php include('header.php'); ?>
        </div>
        
        
        <!-- content -->
        <div id="content" style="min-height: 50vh; margin-top:170px;">
        
        <div style="margin-bottom: 30px;">
            <a href="mysql.php" style="margin-left:30px;">
                <button type="button" class="btn btn-outline-secondary"><span class="fa fa-arrow-left"></span> Prev page</button>
            </a>
        </div>

          <div class="container-fluid">

              <div class="jumbotron">
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
                        <h2>Bài 8</h2>
              <h4>Tìm kiếm sản phẩm</h4>
              <p>Tạo form tìm kiếm sản phẩm, nhập vào tên và tìm gần đúng thông tin chi tiết sản phẩm đó.
                        </p>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
                    <a href="MySQL/B_8_MySQL.php">
                        <button type="button" class="btn btn-outline-secondary">View code</button>
                    </a>
                </div>
              </div>

              <div class="jumbotron">
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
                        <h2>Bài 9</h2>
              <h4>Tìm kiếm sản phẩm (2)</h4>
              <p>Tạo form tìm kiếm sản phẩm, nhập vào tên, hãng và loại, tìm gần đúng thông tin chi tiết sản phẩm đó.
                        </p>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
                    <a href="MySQL/B_9_MySQL.php">
                        <button type="button" class="btn btn-outline-secondary">View code</button>
                    </a>
                </div>
              </div>

              <div class="jumbotron">
                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
                            <h2>Bài 10</h2>
                <h4>Thêm sản phẩm</h4>
                <p>Tạo form thêm sản phẩm, nhập vào tên, hãng, loại,.... Và thêm sản phẩm đó vào database.
                            </p>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
                        <a href="MySQL/B_10_MySQL.php">
                            <button type="button" class="btn btn-outline-secondary">View code</button>
                        </a>
                    </div>
              </div>

              <div class="jumbotron">
                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
                            <h2>Bài 11</h2>
                    <h4>sửa thông tin khách hàng</h4>
                    <p>Tạo form cập nhật thông tin khách hàng và lưu nó vào database
                    </p>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
                        <a href="MySQL/B_11_MySQL.php">
                            <button type="button" class="btn btn-outline-secondary">View code</button>
                        </a>
                    </div>
              </div>

		      </div>
        </div>
        <!-- content -->

        <div>
            <a href="mysql.php" style="margin-left:30px;">
                <button type="button" class="btn btn-outline-secondary"><span class="fa fa-arrow-left"></span> Prev page</button>
            </a>
        </div>

        <div id="footer">
               <?php include('../footer.html') ?>
        </div>
        </div>
    <script language="javaScript">
        window.sessionStorage;
        if(!sessionStorage.getItem("username"))
        {
            alert('Bạn phải đăng nhập trước!');
            window.location.assign('../index.html');
        }
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>