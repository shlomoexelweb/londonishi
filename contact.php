<?php include 'include/PHPMailer/class.phpmailer.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>צור קשר</title>
<link rel="icon" href="images/favicon.gif" type="image/gif" />
<meta name="description" content="לונדון אישי הינו מיזם המציע שירות סיורים בעברית ובהתאמה אישית במגוון יעדים ברחבי העיר לונדון. מאחורי המיזם עומדת גלי קנור, לונדונית כבר כמה שנים" />
<link href="css/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/functions.js"></script>
</head>
<body style="width:auto;">

 <div id="InMainWrapper">

     <!--Inner Logo Pannel Starts -->
     <p class="InlogoPannel"><a href="#"><img src="images/smallLogo.png" alt="" /></a></p>
     <!--Inner Logo Pannel Ends -->

     <!--Top Nav Starts-->
     <div class="navPannel">
       <ul>
         <li> <a href="contact.html">צור קשר</a></li>
              <!--
              <li> <a href="services.html">שירותים נוספים</a></li>
              -->
              <li> <a href="wrote.html">ממליצים עלינו</a></li>
              <li> <a href="tips.html">טיפים</a></li>
              <li> <a href="tracks.html">הסיורים שלנו ושרותים נספים</a></li>
              <li> <a href="about.html">אודות</a></li>
              <li class="nobg"> <a href="index.html">בית</a></li>
        </ul>
     <p class="clear">&nbsp;</p>
     </div>
     <!--Top Nav Ends-->

     <p class="clear">&nbsp;</p>
<?php
//If the form is submitted
if(isset($_POST['submit'])) {
  $admin_email = "info@londonishi.com";
	//Check to make sure that the name field is not empty
	if(trim($_POST['firstname']) == '') {
		$hasError = true;

	} else {
		$firstname = trim($_POST['firstname']);
	}

	if(trim($_POST['lastname']) == '') {
		$hasError = true;
	} else {
		$lastname = trim($_POST['lastname']);
	}

	//Check to make sure sure that a valid email address is submitted
	if(trim($_POST['email']) == '')  {
		$hasError = true;
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}
  $team_array = array(
    '1'  => "זוגי",
    '2'  => "משפחתי",
    '3'  => "אחר",

    );
  $team = "הרכב קבוצה: ";
  if(isset($_POST['team']))
    $team .= $team_array[$_POST['team']];
   else
     $team .= "לא צויין";
 $team .= "<br />";
  $tour_times = "זמני הטיול: ";
  if(isset($_POST['from_date']) && isset($_POST['to_date']))
    $tour_times .= "מתאריך: ". $_POST['from_date'] . " עד תאריך: ". $_POST['to_date'];
  else
    $tour_times .= "לא צויינו / לא צויינו במלואם";
  $tour_times .= "<br />";
	$lastname = trim($_POST['lastname']);
	$phone = trim($_POST['phone']);
	$content = trim(nl2br($_POST['content']));

	$time = time();
	//If there is no error, send the email
	if(!isset($hasError)) {
    // $emailTo = "yedidel@gmail.com,info@londonishi.com";
    $emailTo = $admin_email;
    $subject = 'פנייה מאתר לונדון אישי';
		$body = "<body dir='rtl'>שם: $firstname $lastname <br /><br />אימייל: $email <br /><br />טלפון: $phone<br /><br />תוכן הפנייה:<br /> $content<br /><br />";
    $body .= $team;
    $body .= $tour_times;
		$body .="</body>";
    $headers  = "MIME-Version: 1.0 \n" ;
    $headers .= "From: " .
          "".mb_encode_mimeheader (mb_convert_encoding("London Ishi","utf-8","AUTO")) ."" .
          "<".$admin_email."> \n";
    $headers .= "Content-Type: text/html \n";
    $emailSent = mail($emailTo, $subject, $body, $headers);
    // $mail = new PHPMailer();
    // $mail->Host = 'mailtrap.io';
    // $mail->IsSMTP();
    // $mail->Port = 465;
    // $mail->SMTPDebug = 1;

    // $mail->SMTPAuth = 'tls';

    // $mail->Username = '407135651c1c711ac';
    // $mail->Password = 'f783ec6db64a06';
    // $mail->Subject = 'פנייה מאתר לונדון אישי';
    // $mail->AddAddress("info@londonishi.com");
    // $mail->AddAddress("shlomo@exelweb.co.il");
    // $emailTo = "yedidel@gmail.com,info@londonishi.com"; //Put your own email address here
    // $body = mb_convert_encoding($body, "utf-8","AUTO");
    // $mail->MsgHTML($body);
    // $headers .= "Content-Type: text/html;charset=utf-8 \n";
    // $mail->CharSet= 'UTF-8';
    // $mail->addCustomHeader($headers);
		// $emailSent = $mail->Send();

    if($emailSent){
        // $auto_response = new PHPMailer();
        // $auto_response->Host = 'mailtrap.io';
        // $auto_response->IsSMTP();
        // $auto_response->Port = 465;
        // $auto_response->SMTPDebug = 1;

        // $auto_response->SMTPAuth = 'tls';

        // $auto_response->Username = '407135651c1c711ac';
        // $auto_response->Password = 'f783ec6db64a06';
        // $auto_response->Subject = 'פנייתך לאתר לונדון אישי';
        $auto_response_to = $email;
        $auto_response_Subject = 'פנייתך לאתר לונדון אישי';
        $body = "<body dir='rtl'>שלום $firstname $lastname, <br /><br />";
        /*
        $body .="
        תודה על פנייתך וברוכים הבאים ללונדון!<br />
        נשלח בהקדם מייל ראשוני ומפורט על הסיורים המומלצים שלנו עבורכם,<br />
        בברכה,<br />
        גלי<br />
        לונדון אישי
        ";
        */
        $body .= "
         <p id='tmp-msg'>
              מטיילים יקרים,
        <br />
        <br />
        החל מהיום ועד 2 למאי נהיה עם יכולת מוגבלת להשיב לפניותיכם.
        לכל המטיילים המתכננים להגיע לאחר הפסח אנא האזרו בסבלנות, נהיה בקשר מיד לאחר החג.
        <br />
        <br />
        למקרים דחופים (למטיילים שתיאמו איתנו במהלך החג או למעוניינים להצטרף לסיור המתקיים עד ל 3/5)
        אנא השאירו הודעת ווטסאפ בנייד
        +44 7742 126011
        ונשתדל להשיב לפנייתכם בהקדם.
        <br />
        <br />
        חג פסח נפלא, מצפים לכם כאן בלונדון,
        <br />
        <br />
        גלי וצוות לונדון אישי
            </p>
        ";
        $body .="</body>";
        $headers  = "MIME-Version: 1.0 \n" ;
        $headers .= "From: " .
              "".mb_encode_mimeheader (mb_convert_encoding("London Ishi","utf-8","AUTO")) ."" .
              "<".$admin_email."> \n";
        $headers .= "Content-Type: text/html \n";
        // $auto_response->MsgHTML($body);
        // $auto_response->CharSet= 'UTF-8';
        // $auto_response->addCustomHeader($headers);
       // ******************* temporary disabled 08/11/2015 *************************************** //
        // $response_Sent = mail($auto_response_to, $auto_response_Subject, $body, $headers);
    }
	}

}
?>
     <!--Body Wrapper Starts-->
     <div class="InBodyWrapper">
          <p style="text-align:center;font-weight:bold;direction:rtl;font-size:17px;">
			לפרטים נוספים צרו קשר עם גלי<br />
טלפון אנגלי:
 <span style="direction:ltr;">7884273466 44+ ( גם בווטסאפ)</span>
<br />
                            טלפון ישראלי:
03-7200466 (להשארת הודעה במשיבון)
<br />
           info@londonishi.com
		</p>
        <p id="tmp-msg">
      מטיילים יקרים,
<br />
<br />
החל מהיום ועד 2 למאי נהיה עם יכולת מוגבלת להשיב לפניותיכם.
לכל המטיילים המתכננים להגיע לאחר הפסח אנא האזרו בסבלנות, נהיה בקשר מיד לאחר החג.
<br />
<br />
למקרים דחופים (למטיילים שתיאמו איתנו במהלך החג או למעוניינים להצטרף לסיור המתקיים עד ל 3/5)
אנא השאירו הודעת ווטסאפ בנייד
+44 7742 126011
ונשתדל להשיב לפנייתכם בהקדם.
<br />
<br />
חג פסח נפלא, מצפים לכם כאן בלונדון,
<br />
<br />
גלי וצוות לונדון אישי
    </p>
          <div class="InBodyContainNewBG">
                 <form name="contact" action="contact.php" method="POST">
                 <!--Post Bg Starts-->
                 <div class="postBox">
                  <input type="submit" value="שלח" />
                 </div>
		<input type="hidden" name="submit" value="1" />
                 <!--Post Bg Ends-->

                 <!--Text Area Starts-->
                 <div class="textAreaPannel">
                     <div class="txtArBg"><textarea name="content" cols="10" rows="20" tabindex="5"><?php if (isset($emailSent) && $emailSent) echo "שלום ".$firstname." ". $lastname.", תודה על פנייתך וברוכים הבאים ללונדון! נשלח בהקדם מייל ראשוני ומפורט על הסיורים המומלצים שלנו עבורכם,בברכה,גלי לונדון אישי"; //
else if (isset($hasError) && $hasError==true) echo "נא למלא את כל השדות." ?>
</textarea></div>

                 </div>
                 <!--Text Area Ends-->

                 <!--Input Box Starts-->
                 <div class="inputBoxPannel">

                      <!--<div class="flag"><a href="#"> <img src="images/flagImg.png" alt="" /></a> </div> -->
                      <div class="inputnav">
                        <ul>
                          <li class="padone">
                            <div class="inputxt"><input type="text" name="firstname" tabindex="1" placeholder="שם פרטי"/></div> <div class="txtright"><span></span></div>
                          </li>
                          <li class="padtwo">
                            <div class="inputxt"><input type="text" name="lastname" tabindex="2" placeholder="שם משפחה"/></div> <div class="txtright"><span></span></div>
                          </li>
                          <li class="padthree">
                            <div class="inputxt"><input type="text" name="email" tabindex="3" placeholder="אמייל"/></div><div class="txtright"><span></span></div>
                          </li>
                           <li class="padfour">
                            <div class="inputxt"><input type="text" name="phone" tabindex="4" placeholder="טלפון" required/></div><div class="txtright"><span></span></div>
                          </li>
                          <li class="padfour">
                            <div class="inputxt">
                              <select required>
                                <option value="0">--הרכב קבוצה--</option>
                                <option value="1">זוגי</option>
                                <option value="2">משפחתי</option>
                                <option value="3">אחר</option>
                              </select>
                            </div>
                            <div class="txtright"><span></span></div>
                          </li>
                          <li class="padfour">
                          <span id="arrival-date-label">מועדי הגעה</span>
                            <div class="inputxt">
                              <input type="text" name="phone" tabindex="4" placeholder="מתאריך" class="datepicker"/>
                              <input type="text" name="phone" tabindex="4" placeholder="עד תאריך" class="datepicker"/>
                            </div>
                            <div class="txtright"><span></span></div>
                          </li>
                       </ul>
                       <p class="clear">&nbsp;</p>
                      </div>

                 <p class="clear">&nbsp;</p>
                 </div>
                 <!--Input Box Ends-->

        <p class="clear">&nbsp;</p>
        </div>
     <p class="clear">&nbsp;</p>
     </div>
     <!--Body Wrapper Starts-->

    <!--Footer Wrapper Starts-->
      <div class="fooreWrapper" style="left:-42px;">
     <div class="footerNav">
           <ul>
 		 <li style="direction:ltr;">+44 7884273466 </li>
		<li>טלפון אנגלי: </li>
               <li>&nbsp;|&nbsp; </li>
   <li>03-7200466</li>
               <li>גלי טלפון ישראלי: </li>
           </ul>
      <p class="clear">&nbsp;</p>
      </div>
	<span align="center" style="font-weight:bold;">info@londonishi.com</span>
        <h2><a href="http://nlconnection.eu/limcadesign.html" target="_blank">Site Design By Limcadesign</a></h2>
     <p class="clear">&nbsp;</p>
     </div>
     <!--Footer Wrapper Ends-->

 <p class="clear">&nbsp;</p>
 </div>

</body>
</html>
