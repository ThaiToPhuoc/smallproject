<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>basic php</title>
    </head>
    <body>
    <style type="text/css">
            body{
                font-family: Cambria;
                /*background: rgb(149,253,255);*/
                background: linear-gradient(0deg, rgba(149,253,255,1) 0%, rgba(255,255,255,1) 92%);
                height: 100vh;
            }

            form, .form{
                display: flex;
                justify-content: center;
                align-content: center;
                padding-top: 10%;
            }
            .grid-container-4{
                background-color: white;
                padding: 10px;
                display: grid;
                grid-template-columns: 130px 300px 130px 300px;
                
                vertical-align: middle;
                grid-gap: 10px 10px;
                border-radius: 5px;
                box-shadow: 4px 3px 8px 1px #969696;
                -webkit-box-shadow: 4px 3px 8px 1px #969696;
            }

            input[type=text], input[type=date], input[type=number], select, textarea, .submit{
                max-width: 100%;
                min-width: 100%;
                box-sizing: border-box;
                border-radius: 3px;
                border: 1px solid gray;
                padding: .375rem .75rem;
                font-weight: 400;
                font-size: 1rem;
            }

            .item2-3{
                grid-column: 2 / 4;
            }

            .item1-4{
                grid-column: 1 / 4;
            }

            .item1-5{
                grid-column: 1 / 5;
            }
                        
            .half{
                width: 50%;
            }
        </style>
    
        <?php
            class Phanso
            {
                public $TuSo;
                public $MauSo;

                public function HienThi()
                {
                    echo $this->TuSo. '/' .$this->MauSo;
                }

                private function UCLN()
                {
                    $tmp;
                    $a = abs($this->TuSo);
                    $b = abs($this->MauSo);
                    while($b != 0) {
                        $tmp = $a % $b;
                        $a = $b;
                        $b = $tmp;
                    }
                    return $a;
                }

                public function ToiGian()
                {
                    $ucln = $this->UCLN();
                    $this->TuSo = $this->TuSo / $ucln;
                    $this->MauSo = $this->MauSo / $ucln;
                }
            }

            interface Tinh{
                public function Tinh(Phanso $ps1, Phanso $ps2);
            }

            class cong implements Tinh
            {
                function Tinh(Phanso $ps1, Phanso $ps2)
                {
                    $Ketqua = new Phanso();
                    $Ketqua->MauSo =  $ps1->MauSo * $ps2->MauSo;
                    $Ketqua->TuSo = $ps1->TuSo * $ps2->MauSo + $ps1->MauSo * $ps2->TuSo;
                    $Ketqua->ToiGian();
                    return $Ketqua;
                }
            }

            class Tru implements Tinh
            {
                function Tinh(Phanso $ps1, Phanso $ps2)
                {
                    $Ketqua = new Phanso();
                    $Ketqua->MauSo =  $ps1->MauSo * $ps2->MauSo;
                    $Ketqua->TuSo = $ps1->TuSo * $ps2->MauSo - $ps1->MauSo * $ps2->TuSo;
                    $Ketqua->ToiGian();
                    return $Ketqua;
                }
            }

            class Nhan implements Tinh
            {
                function Tinh(Phanso $ps1, Phanso $ps2)
                {
                    $Ketqua = new Phanso();
                    $Ketqua->MauSo =  $ps1->MauSo * $ps2->MauSo;
                    $Ketqua->TuSo = $ps1->TuSo * $ps2->TuSo;
                    $Ketqua->ToiGian();
                    return $Ketqua;
                }
            }

            class Chia implements Tinh
            {
                function Tinh(Phanso $ps1, Phanso $ps2)
                {
                    $Ketqua = new Phanso();
                    $Ketqua->MauSo =  $ps1->MauSo * $ps2->TuSo;
                    $Ketqua->TuSo = $ps1->TuSo * $ps2->MauSo;
                    $Ketqua->ToiGian();
                    return $Ketqua;
                }
            }

            $ps1 = new Phanso();
            $ps2 = new Phanso();

            if(isset($_POST['submit']))
            {
                $ps1->TuSo = $_POST['tuso1'];
                $ps1->MauSo = $_POST['mauso1'];
                $ps2->TuSo = $_POST['tuso2'];
                $ps2->MauSo = $_POST['mauso2'];
                $pheptinh;
                if($_POST['pheptinh'] == '+')
                    $pheptinh = new Cong();
                if($_POST['pheptinh'] == '-')
                    $pheptinh = new Tru();
                if($_POST['pheptinh'] == '*')
                    $pheptinh = new Nhan();
                if($_POST['pheptinh'] == '/')
                    $pheptinh = new Chia();
                $KQ = $pheptinh->Tinh($ps1,$ps2);
            }
            else
            {
                $ps1->TuSo = 0;
                $ps1->MauSo = 0;
                $ps2->TuSo = 0;
                $ps2->MauSo = 0;
            }
        ?>

        <form name="oop" action="OOP2.php" method="POST">
            <div class="grid-container-4">
                <div class="grid-item">Nhập phân số thứ 1: Tử số: </div>
                <div class="grid-item">
                    <input type="number" name="tuso1" required value="<?php echo (isset($_POST['submit'])?$ps1->TuSo:''); ?>">
                </div>
                <div class="grid-item">Mẫu số:</div>
                <div class="grid-item half">
                    <input type="number" name="mauso1" required value="<?php echo (isset($_POST['submit'])?$ps1->MauSo:''); ?>">
                </div>

                <div class="grid-item">Nhập phân số thứ 2: Tử số: </div>
                <div class="grid-item">
                    <input type="number" name="tuso2" required value="<?php echo (isset($_POST['submit'])?$ps2->TuSo:''); ?>">
                </div>
                <div class="grid-item">Mẫu số:</div>
                <div class="grid-item half">
                    <input type="number" name="mauso2" required value="<?php echo (isset($_POST['submit'])?$ps2->MauSo:''); ?>">
                </div>

                <div class="grid-item item1-5">
                    <fieldset> 
                    <legend>Chọn phép tính:</legend>
                    <input type="radio" name="pheptinh" value="+" checked> Cộng
                    <input type="radio" name="pheptinh" value="-"> Trừ
                    <input type="radio" name="pheptinh" value="*"> Nhân
                    <input type="radio" name="pheptinh" value="/"> Chia
                    </fieldset>
                </div>
                <div class="grid-item item1-5">
                    <input type="submit" name="submit" value="Kết quả">
                </div>
                <div class="item1-5">
                    <?php
                        if(isset($_POST['submit']))
                        {
                            echo '<p>Kết quá phép tính: '.$ps1->TuSo.'/'.$ps1->MauSo.' '.$_POST['pheptinh'].' '.$ps2->TuSo.'/'.$ps2->MauSo.'';
                            echo ' = '.$KQ->TuSo.'/'.$KQ->MauSo.' </p>';
                        }
                    ?>
                </div>
            </div>

        </form>
        <p>source code php:</p>
        <textarea cols='60' rows='8' style="height:50vh;">
            class Phanso
            {
                public $TuSo;
                public $MauSo;

                public function HienThi()
                {
                    echo $this->TuSo. '/' .$this->MauSo;
                }

                private function UCLN()
                {
                    $tmp;
                    $a = abs($this->TuSo);
                    $b = abs($this->MauSo);
                    while($b != 0) {
                        $tmp = $a % $b;
                        $a = $b;
                        $b = $tmp;
                    }
                    return $a;
                }

                public function ToiGian()
                {
                    $ucln = $this->UCLN();
                    $this->TuSo = $this->TuSo / $ucln;
                    $this->MauSo = $this->MauSo / $ucln;
                }
            }

            interface Tinh{
                public function Tinh(Phanso $ps1, Phanso $ps2);
            }

            class cong implements Tinh
            {
                function Tinh(Phanso $ps1, Phanso $ps2)
                {
                    $Ketqua = new Phanso();
                    $Ketqua->MauSo =  $ps1->MauSo * $ps2->MauSo;
                    $Ketqua->TuSo = $ps1->TuSo * $ps2->MauSo + $ps1->MauSo * $ps2->TuSo;
                    $Ketqua->ToiGian();
                    return $Ketqua;
                }
            }

            class Tru implements Tinh
            {
                function Tinh(Phanso $ps1, Phanso $ps2)
                {
                    $Ketqua = new Phanso();
                    $Ketqua->MauSo =  $ps1->MauSo * $ps2->MauSo;
                    $Ketqua->TuSo = $ps1->TuSo * $ps2->MauSo - $ps1->MauSo * $ps2->TuSo;
                    $Ketqua->ToiGian();
                    return $Ketqua;
                }
            }

            class Nhan implements Tinh
            {
                function Tinh(Phanso $ps1, Phanso $ps2)
                {
                    $Ketqua = new Phanso();
                    $Ketqua->MauSo =  $ps1->MauSo * $ps2->MauSo;
                    $Ketqua->TuSo = $ps1->TuSo * $ps2->TuSo;
                    $Ketqua->ToiGian();
                    return $Ketqua;
                }
            }

            class Chia implements Tinh
            {
                function Tinh(Phanso $ps1, Phanso $ps2)
                {
                    $Ketqua = new Phanso();
                    $Ketqua->MauSo =  $ps1->MauSo * $ps2->TuSo;
                    $Ketqua->TuSo = $ps1->TuSo * $ps2->MauSo;
                    $Ketqua->ToiGian();
                    return $Ketqua;
                }
            }

            $ps1 = new Phanso();
            $ps2 = new Phanso();

            if(isset($_POST['submit']))
            {
                $ps1->TuSo = $_POST['tuso1'];
                $ps1->MauSo = $_POST['mauso1'];
                $ps2->TuSo = $_POST['tuso2'];
                $ps2->MauSo = $_POST['mauso2'];
                $pheptinh;
                if($_POST['pheptinh'] == '+')
                    $pheptinh = new Cong();
                if($_POST['pheptinh'] == '-')
                    $pheptinh = new Tru();
                if($_POST['pheptinh'] == '*')
                    $pheptinh = new Nhan();
                if($_POST['pheptinh'] == '/')
                    $pheptinh = new Chia();
                $KQ = $pheptinh->Tinh($ps1,$ps2);
            }
            else
            {
                $ps1->TuSo = 0;
                $ps1->MauSo = 0;
                $ps2->TuSo = 0;
                $ps2->MauSo = 0;
            }
        </textarea>
    </body>
</html>