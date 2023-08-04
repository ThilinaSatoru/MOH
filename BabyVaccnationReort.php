<?php
   require_once('conection.php');
        $query2 = "select * from babyvaccinecard order by reportID desc limit 1";
        $result2 = mysqli_query($con,$query2);
        $row = mysqli_fetch_array($result2);
        $last_id = $row['reportID'];
        if ($last_id == "")
        {
            $customer_ID = "Rp001";
        }
        else
        {
            $customer_ID = substr($last_id, 3);
            $customer_ID = intval($customer_ID);
            $customer_ID= "Rp" . ($customer_ID + 1);
        }
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>BABY VACCINE REORT</title>
</head>
<body>
   
    <div class="container">
        <h1>Baby Vaccine Report</h1>
         <form action="">


            <div class="user-details">
                <div class="input-box">
                <span class="details">Report ID</span>
                <input type="text" placeholder="Enter reort ID"  style="color: red" value="<?php echo $customer_ID; ?>" required>  
                </div>

                <div class="input-box">
                    <span class="details">Baby ID</span>
                    <input type="text" placeholder="Enter Baby ID" required>
                </div>
                <div class="input-box">
                    <span class="details">Baby Name</span>
                    <input type="text" placeholder="Enter Baby Name" required>
                </div>
              

                <h3>Vaccination Details</h3>

                <div class="form-card">
            <table>
              <tbody>
                <tr>

                  <td><h3>bcg vaccine</h3></td>
                  <td class="table-right-side">
                    <button class="click-button">1<sup>st</sup> dose</button>
                    <button class="click-button">2<sup>nd</sup> dose</button>
                  </td>
                </tr>
                <tr>
                  <td><h3>polio</h3></td>
                  <td class="table-right-side">
                    <button class="click-button">1<sup>st</sup> dose</button>
                    <button class="click-button">2<sup>nd</sup> dose</button>
                  </td>
                </tr>
                <tr>
                  <td><h3>sarampa</h3></td>
                  <td class="table-right-side">
                    <button class="click-button">1<sup>st</sup> dose</button>
                    <button class="click-button">2<sup>nd</sup> dose</button>
                  </td>
                </tr>
                <tr>
                  <td><h3>se</h3></td>
                  <td class="table-right-side">
                    <button class="click-button">1<sup>st</sup> dose</button>
                    <button class="click-button">2<sup>nd</sup> dose</button>
                  </td>
                </tr>
                <tr>
                  <td><h3>hep(bb)</h3></td>
                  <td class="table-right-side">
                    <button class="click-button">1<sup>st</sup> dose</button>
                    <button class="click-button">2<sup>nd</sup> dose</button>
                  </td>
                </tr>
            
              </tbody>
            </table>
          </div>

                <div class="input-box">
                    <span class="details"> Who is approved  this Vaccine report</span>
                    <input type="text" placeholder="Who is approved  this Vaccine report">
                </div>


                <div class="input-box">
                    <span class="details">Aproved Vaccine Report or Not</span>
                    <input type="text" placeholder="YES OR NO">
                </div>
                <br>
                <br>  
                <div class="button">
                    <input type="submit" value="save">
                </div>    
                
                   
            </div>
            
         </form>
           
       

    </div>
    
</body>
</html>