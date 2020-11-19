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
        
          <div class="container-fluid">
            
            <div class="jumbotron">
              <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
                      <h2>Bài 1</h2>
            <h4>Chương trình quản lý nhân viên</h4>
            <p>Xây dựng các lớp NHÂN VIÊN, NHÂN VIÊN VĂN PHÒNG, NHÂN VIÊN SẢN XUẤT và tính lương cho từng nhóm đối tượng.
                      </p>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
                  <a href="OOP/OOP1.php">
                      <button type="button" class="btn btn-outline-secondary">View code</button>
                  </a>
              </div>
            </div>

            <div class="jumbotron">
              <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
                      <h2>Bài 2</h2>
            <h4>Làm phép tính trên phân số</h4>
            <p>Xây dựng các lớp phân số và phép tính, nhập vào 2 phân số và phép tính mình muốn, in ra màn hình kết quả.
                      </p>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
                  <a href="OOP/OOP2.php">
                      <button type="button" class="btn btn-outline-secondary">View code</button>
                  </a>
              </div>
            </div>

            <div class="jumbotron">
              <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
                      <h2>Bài 3</h2>
            <h4>Chương trình quản lý cán bộ, sinh viên</h4>
            <p>Xây dựng các lớp GIẢNG VIÊN, CHUYÊN VIÊN, SINH VIÊN, lưu lại trên các file text riêng biệt.
                      </p>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
                  <a href="OOP/OOP3.php">
                      <button type="button" class="btn btn-outline-secondary">View code</button>
                  </a>
              </div>
            </div>

		      </div>
        </div>
        <!-- content -->
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