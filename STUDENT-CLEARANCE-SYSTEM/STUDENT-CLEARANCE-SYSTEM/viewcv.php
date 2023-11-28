<?php
@include('includes/config.php');
if(isset($_GET['StudentRegno'])){
    $id  = $_GET['StudentRegno'];
  }

  $select = "SELECT * FROM cv_data WHERE admission = '$id'";
$res = mysqli_query($bd,$select);
$row = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
<body>

<div class="container">
  <!-- Print PDF button -->
<button id="printPdfButton" style="position: fixed; top: 20px; left: 20px; padding: 10px; background-color: #54AFE4; color: #fff; border: none; border-radius: 5px; cursor: pointer;">Print PDF</button>
  <div class="header">
    <div class="full-name">
      <span class="first-name"><?php echo $row['full_name']?></span> 
      
    </div>
    <div class="contact-info">
      <span class="email">Email: </span>
      <span class="email-val"><?php echo $row['email']?></span>
      <span class="separator"></span>
      <span class="phone">Phone: </span>
      <span class="phone-val"><?php echo $row['phone']?></span>
    </div>
    
    
  </div>
   <div class="details">
    <div class="section">
      <div class="section__title">Experience</div>
      <div class="section__list">
        <div class="section__list-item">
          <div class="left">
            <div class="name"><?php echo $row['experience']?></div>
            
          </div>
          
          

      </div>
    </div>
    <div class="section">
      <div class="section__title">Education</div>
      <div class="section__list">
        <div class="section__list-item">
          <div class="left">
            <div class="name"><?php echo $row['heducation']?></div>
            
          </div>
          <div class="right">
            <div class="name">Course</div>
            <div class="desc"><?php echo $row['course']?></div>
          </div>
        </div>
        <div class="section__list-item">
          <div class="left">
            <div class="name"><?php echo $row['leducation']?></div>
            
          </div>
          <div class="right">
            <div class="name">Completed</div>
            <div class="desc"><?php echo $row['did']?></div>
          </div>
        </div>

      </div>
      
  </div>
     <div class="section">
      <div class="section__title">Projects</div> 
       <div class="section__list">
         <div class="section__list-item">
           
           <div class="text"><?php echo $row['projects']?>.</div>
         </div>
         
        
         </div>
       </div>
    </div>
     <div class="section">
       <div class="section__title">Skills</div>
       <div class="skills">
         <div class="skills__item">
           <div class="left"><div class="name">
           <?php echo $row['skills']?>
             </div></div>
           <div class="right">
                          <input  id="ck1" type="checkbox" checked/>

             <label for="ck1"></label>
                          <input id="ck2" type="checkbox" checked/>

              <label for="ck2"></label>
                         <input id="ck3" type="checkbox" />

              <label for="ck3"></label>
                           <input id="ck4" type="checkbox" />
            <label for="ck4"></label>
                          <input id="ck5" type="checkbox" />
              <label for="ck5"></label>

           </div>
         </div>
         
       </div>
       <div class="skills__item">
           <div class="left"><div class="name">
           <?php echo $row['skill2']?></div></div>
           <div class="right">
                          <input  id="ck1" type="checkbox" checked/>

             <label for="ck1"></label>
                          <input id="ck2" type="checkbox" checked/>

              <label for="ck2"></label>
                         <input id="ck3" type="checkbox" />

              <label for="ck3"></label>
                           <input id="ck4" type="checkbox" />
            <label for="ck4"></label>
                          <input id="ck5" type="checkbox" />
              <label for="ck5"></label>

           </div>
         </div>
         
       </div>
     <div class="section">
     
     </div>
     </div>
  </div>
</div>
</body>
<script>
// JavaScript to handle the "Print PDF" button functionality
document.getElementById("printPdfButton").addEventListener("click", function() {
    window.print();
});
</script>
<style>
  * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
html {
  height: 100%;  
}

body {
  min-height: 100%;  
  background: #eee;
  font-family: 'Lato', sans-serif;
  font-weight: 400;
  color: #222;
  font-size: 14px;
  line-height: 26px;
  padding-bottom: 50px;
}

.container {
  max-width: 700px;   
  background: #fff;
  margin: 0px auto 0px; 
  box-shadow: 1px 1px 2px #DAD7D7;
  border-radius: 3px;  
  padding: 40px;
  margin-top: 50px;
}

.header {
  margin-bottom: 30px;
  
  .full-name {
    font-size: 40px;
    text-transform: uppercase;
    margin-bottom: 5px;
  }
  
  .first-name {
    font-weight: 700;
  }
  
  .last-name {
    font-weight: 300;
  }
  
  .contact-info {
    margin-bottom: 20px;
  }
  
  .email ,
  .phone {
    color: #999;
    font-weight: 300;
  } 
  
  .separator {
    height: 10px;
    display: inline-block;
    border-left: 2px solid #999;
    margin: 0px 10px;
  }
  
  .position {
    font-weight: bold;
    display: inline-block;
    margin-right: 10px;
    text-decoration: underline;
  }
}


.details {
  line-height: 20px;
  
  .section {
    margin-bottom: 40px;  
  }
  
  .section:last-of-type {
    margin-bottom: 0px;  
  }
  
  .section__title {
    letter-spacing: 2px;
    color: #54AFE4;
    font-weight: bold;
    margin-bottom: 10px;
    text-transform: uppercase;
  }
  
  .section__list-item {
    margin-bottom: 40px;
  }
  
  .section__list-item:last-of-type {
    margin-bottom: 0;
  }
  
  .left ,
  .right {
    vertical-align: top;
    display: inline-block;
  }
  
  .left {
    width: 60%;    
  }
  
  .right {
    tex-align: right;
    width: 39%;    
  }
  
  .name {
    font-weight: bold;
  }
  
  a {
    text-decoration: none;
    color: #000;
    font-style: italic;
  }
  
  a:hover {
    text-decoration: underline;
    color: #000;
  }
  
  .skills {
    
  }
    
  .skills__item {
    margin-bottom: 10px;  
  }
  
  .skills__item .right {
    input {
      display: none;
    }
    
    label {
      display: inline-block;  
      width: 20px;
      height: 20px;
      background: #C3DEF3;
      border-radius: 20px;
      margin-right: 3px;
    }
    
    input:checked + label {
      background: #79A9CE;
    }
  }
}









</style>
</html>