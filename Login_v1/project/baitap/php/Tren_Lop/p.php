<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 
    
    //Variables
    $str_min = "";
    $str_sotrung ="";
    $str_sochan = "";
    $str_sole = "";
    $str_le = "";
    $str_kq = "";
    $str_chan = "";
    $n = "";
    $str_tong = "";
    $str_max = "";
    $str_tang = "";
    $str_kq2 = "";

    //Functions
    function random($n)
    {
        $array = array();
          
        for ($i=0; $i < $n; $i++) { 
                $array[$i] = rand(-10,10);
        }
        return $str_kq = implode(" ",$array); //chuỗi
    }

    function inmangChan($n,$array){
        $str_chan = "";
        for ($i=0; $i < $n; $i++) { 
            if($array[$i] % 2 == 0)
            {
                $str_chan = $str_chan.$array[$i]." ";
            }
        }
         return $str_chan; 
    }

    function inmangLe($n,$array){
        $str_le = "";
        for ($i=0; $i < $n; $i++) { 
            if($array[$i] % 2 != 0)
            {
                $str_le = $str_le.$array[$i]." ";
            }
        }
        return $str_le; 
    }

    function insoChan($n,$array){
        $str_sochan = "";
        $dem = 0;
        for ($i=0; $i < $n; $i++) { 
            if($array[$i] % 2 == 0)       
            {
                $str_sochan =  ++$dem;
            }
        }
        return $str_sochan; 
    }

    function insoLe($n,$array){
        $str_sole = "";
        $dem = 0;
        for ($i=0; $i < $n; $i++) { 
            if($array[$i] % 2 != 0)
            {
                $str_sole =  ++$dem;
            }
        }
        return $str_sole; 
    }

    function insoTrung($n,$array){
        $str_sotrung = "";

        for ($i=0; $i < $n; $i++) { 
            for ($j=$i+1; $j < $n ; $j++) { 
                if($array[$i] == $array[$j]){
                    $str_sotrung = $array[$i]; 
                         
                }
            }               
        }
        return $str_sotrung;
              
    }

    function tongMang($n,$array){
        $str_tong = 0;
        for ($i=0; $i < $n; $i++) { 
            $str_tong += $array[$i];
        }
        return $str_tong;
    }

    function inMax($n,$array){
        $str_max = "";
        for ($i=0; $i < $n; $i++) { 
            if($i == 0)
            {
                $str_max = $array[$i];
            }
            else if($array[$i] > $str_max){
                $str_max = $array[$i];
            }
        }
        return $str_max;
    }

    function inMin($n,$array){
        $str_min = "";
        for ($i=0; $i < $n; $i++) { 
            if($i == 0){
                $str_min = $array[$i];
            }
            else if($array[$i] < $str_min){
                $str_min = $array[$i];
            }
        }
        return $str_min;
    }

    function mangTang($n,$array){
        $str_tang = "";
        sort($array);

        for ($i=0; $i < $n; $i++) { 
            $str_tang = $str_tang.$array[$i]." ";
        }
        return $str_tang;
    }

    function mangGiam($n,$array){
        $str_giam = "";
        rsort($array);

        for ($i=0; $i < $n; $i++) { 
            $str_giam = $str_giam.$array[$i]." ";
        }
        return $str_giam;
    }

    function GhepMang($array_1,$array_2)
    {
        // $str_noimang = implode(" ",$arr2);
        // return $str_noimang;
        return implode(", ", array_merge($array_1, $array_2));
    }
    
    if((isset($_POST['n'])) && isset($_POST['render'])){
        $n = $_POST['n'];
        isset($_POST['str_kq2']);
        $str_kq2 = $_POST['str_kq2'];
        $arr2 = explode(",",str_replace(" ", "", $str_kq2));
        $str_kq = random($n);

        $array  = explode (" ",$str_kq);//mảng
        $str_chan = inmangChan($n,$array);

        //   $array  = explode (" ",$str_kq);//mảng
        $str_le = inmangLe($n,$array);

        //   $array  = explode (" ",$str_kq);//mảng
        $str_sochan = insoChan($n,$array);

        // $array  = explode (" ",$str_kq);//mảng
        $str_sole = insoLe($n,$array);
        $str_sotrung = insoTrung($n,$array);
           
        $str_tong = tongMang($n,$array);

        $str_max = inMax($n,$array);
            
        $str_min = inMin($n,$array);

        $str_tang = mangTang($n,$array);

        $str_giam = mangGiam($n,$array);

        $str_noimang = GhepMang($array,$arr2);
    }
?>


<form action="" method="post">
        <table cellpadding="0" style="border: 1px solid black; background:#ccc">
            <th colspan="2"  style="color:red; background:yellow"><h2>TÌM KIẾM</h2></th>
            <tr>
                <td>Nhập số n:</td>
                <td><input type="text" name="n" size= "70" value="<?php echo $n;?> "/></td>

            </tr>

            <tr>
                <td></td>
                <td><input type="submit" name="render"  size="20" value="Render"/></td>

            </tr>

            <tr>
                <td>Mảng:</td>
                <td><input type="text" name="str_kq" size= "70" disabled="disabled" value="<?php echo $str_kq;?> "/></td>
        
            </tr >


            <tr>
                <td>Mảng2:</td>
                <td><input type="text" name="str_kq2" size= "70"  value="<?php echo $str_kq2;?> "/></td>
        
            </tr >


            

            <tr>
                <td>In mảng chẵn:</td>
                <td><input type="text"  size= "70" disabled="disabled" value="<?php echo $str_chan;?> "/></td>
        
            </tr >

            <tr>
                <td>In mảng sô lẻ:</td>
                <td><input type="text"  size= "70" disabled="disabled" value="<?php echo $str_le;?> "/></td>
        
            </tr >


            <tr>
                <td>In ra sô chẵn:</td>
                <td><input type="text"   size= "70" disabled="disabled" value="<?php echo $str_sochan;?> "/></td>
        
            </tr >

            <tr>
                <td>In ra sô lẻ:</td>
                <td><input type="text"   size= "70" disabled="disabled" value="<?php echo $str_sole;?> "/></td>
        
            </tr >


            <tr>
                <td>In ra giá trị trùng:</td>
                <td><input type="text"   size= "70" disabled="disabled" value="<?php echo $str_sotrung;?> "/></td>
        
            </tr >


            <tr>
                <td>Tổng mảng:</td>
                <td><input type="text"   size= "70" disabled="disabled" value="<?php echo $str_tong;?> "/></td>
        
            </tr >

              <tr>
                <td>Giá trị max:</td>
                <td><input type="text"   size= "70" disabled="disabled" value="<?php echo $str_max;?> "/></td>
        
            </tr >

            <tr>
                <td>Giá trị min:</td>
                <td><input type="text"   size= "70" disabled="disabled" value="<?php echo $str_min;?> "/></td>
        
            </tr >


            <tr>
                <td>Mảng tăng:</td>
                <td><input type="text"   size= "70" disabled="disabled" value="<?php echo $str_tang;?> "/></td>
        
            </tr >

            <tr>
                <td>Mảng giảm:</td>
                <td><input type="text"   size= "70" disabled="disabled" value="<?php echo $str_giam;?> "/></td>
        
            </tr >

            <tr>
                <td>Nối mảng:</td>
                <td><input type="text"   size= "70" disabled="disabled" value="<?php echo $str_noimang;?> "/></td>
        
            </tr >




           
            <tr>
                <td colspan="2" align="center"><label>(Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</label></td>

            </tr>
        </table>
    </form>
</body>
</html> 