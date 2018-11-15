<?php

include ('../configs/mysql.php');
include ('../configs/page.php');

header('Content-Type: text/html; charset=utf-8');

if($_GET['add-event'] == 1) {

    if(isset($_POST['submit']))
        {
            $game=$_POST['game'];
            $date=$_POST['date'];
            $time=$_POST['time'];
            $todate=$_POST['todate'];
            $totime=$_POST['totime'];
            $league=$_POST['league'];
            $link=$_POST['link'];
            $logo=$_POST['logo'];
            $display=$_POST['customControlInline'];

            $sql = "INSERT INTO events (game, date, time, name, link, logo, totime, todate, display) VALUES ('$game', '$date', '$time', '$league', '$link', '$logo', '$totime', '$todate', '$display')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                header('location: ../../app/?page=events');
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
} else if($_GET['add-game'] == 1) {

    if(isset($_POST['submit']))
    {
        $name=$_POST['name'];
        $identifier=$_POST['ident'];

        $sql = "INSERT INTO games (name, identifier) VALUES ('$name', '$identifier')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            header('location: ../../app/?page=games');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
} else if($_GET['edit-game'] == 1) {

    if(isset($_POST['submit']))
    {
        $gameid=$_POST['gameid'];
        $name=$_POST['name'];
        $identifier=$_POST['ident'];

        $sql = "UPDATE games SET name='$name', identifier='$identifier' WHERE id='$gameid'";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            header('location: ../../app/?page=games');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    if(isset($_POST['reset'])) {

    }
} else if ($_GET['add-invoice'] == 1) {

    if(isset($_POST['submit']))
    {
        $date=$_POST['date'];
        $time=$_POST['time'];
        $company=$_POST['issuer'];
        $filename=$_FILES['uploaded_file']['name'];

        $filename = str_replace(' ', '_', $filename);

        $saveurl="$url/files/invoices/$filename";

        if(!empty($_FILES['uploaded_file']))
        {
            $path = "../../files/invoices/";
            $path = $path . basename( $filename);
            if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path))
            {
                $sql = "INSERT INTO invoices (company, date, time, saveurl, file_name) VALUES ('$company', '$date', '$time', '$saveurl', '$filename')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                    header('location: ../../app/?page=invoices');
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
            }

            } else {
                echo "There was an error uploading the file, please try again!";
            }
        }
    } else if(isset($_POST['send'])) {

        require_once('../../assets/functions/send-invoice.php');

        $date=$_POST['date'];
        $time=$_POST['time'];
        $company=$_POST['issuer'];
        $filename=$_FILES['uploaded_file']['name'];

        $filename = str_replace(' ', '_', $filename);

        $saveurl="$url/files/invoices/$filename";

        if(!empty($_FILES['uploaded_file']))
        {
            $path = "../../files/invoices/";
            $path = $path . basename( $filename);
            if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path))
            {
                $sql = "INSERT INTO invoices (company, date, time, saveurl, file_name, status) VALUES ('$company', '$date', '$time', '$saveurl', '$filename', '1')";

                if ($conn->query($sql) === TRUE) {

                    mail_att("finance@teamprismatic.com", "New Invoice from ".$company."", "Hello dear accounting,<br> a new invoice was uploaded via https://app.teamprismatic.com.<br><br>Kind regards,<br> Staff", "Team Prismatic", "noreply@teamprismatic.com", "noreply@teamprismatic.com", "".$path."");

                    echo "New record created successfully";
                    header('location: ../../app/?page=invoices');
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
            }

            } else {
                echo "There was an error uploading the file, please try again!";
            }
        }
    }
} else if ($_GET['add-match'] == 1) {

    if(isset($_POST['submit']))
    {
        $game=$_POST['game'];
        $date=$_POST['date'];
        $time=$_POST['time'];
        $team1=$_POST['team1'];
        $team2=$_POST['team2'];
        $league=$_POST['league'];
        $link=$_POST['link'];
        $result=$_POST['optradio'];
        $streamlink=$_POST['streamlink'];
        $team1logo=$_POST['team1logo'];
        $team2logo=$_POST['team2logo'];
        $score1=$_POST['score1'];
        $score2=$_POST['score2'];

        $sql = "INSERT INTO matches (game, date, time, team1, team2, league, link, team1logo, team2logo, result, score1, score2, streamlink) VALUES ('$game', '$date', '$time', '$team1', '$team2', '$league', '$link', '$team1logo', '$team2logo', '$result', '$score1', '$score2', '$streamlink')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            header('location: ../../app/?page=matches');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
} else if ($_GET['add-press'] == 1) {

    if(isset($_POST['submit']))
    {
        $author=$_POST['author'];
        $date=$_POST['date'];
        $title=$_POST['title'];
        $excerp=$_POST['excerp'];
        $url=$_POST['url'];

        $entitle = utf8_decode($title);
        $enexcerp = utf8_decode($excerp);

        $sql = "INSERT INTO press_releases (author, date, title, excerp, url) VALUES ('$author', '$date', '$entitle', '$enexcerp', '$url')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            header('location: ../../app/?page=press-releases');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
} else if ($_GET['add-task'] == 1) {

    if(isset($_POST['submit']))
    {
        $fromuser=$_POST['ident'];
        $title=$_POST['title'];
        $date=$_POST['date'];
        $worker=$_POST['worker'];
        $projectedited=$_POST['projectedited'];
        $detail=$_POST['detail'];
        $importance=$_POST['importance'];

        $detail = str_replace(chr(13),"<br/>", $detail);

        $enworker = json_encode($worker);

        $timestamp = date("Y-m-d");

        $entitle = utf8_decode($title);
        $enexcerp = utf8_decode($detail);

        $sql = "INSERT INTO tasks (title, fromdate, todate, touser, assigneduser, text, fromuser, importance) VALUES ('$title', '$timestamp', '$date', '$enworker', '$projectedited', '$detail', '$fromuser', '$importance')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            header('location: ../../app/?page=tasks');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
} else if ($_GET['edit-task'] == 1) {

    if(isset($_POST['submit']))
    {
        $taskid=$_POST['ident'];
        $title=$_POST['title'];
        $date=$_POST['date'];
        $worker=$_POST['worker'];
        $projectedited=$_POST['projectedited'];
        $detail=$_POST['detail'];
        $importance=$_POST['importance'];

        $detail = str_replace(chr(13),"<br/>", $detail);

        $enworker = json_encode($worker);

        $timestamp = date("Y-m-d");

        $entitle = utf8_decode($title);
        $enexcerp = utf8_decode($detail);

        $sql = "UPDATE tasks SET title='$title', todate='$date', touser='$enworker', assigneduser='$projectedited', text='$detail', importance='$importance' WHERE id='$taskid'";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            header('location: ../../app/?page=tasks');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
} else if ($_GET['add-announcements'] == 1) {

    if(isset($_POST['submit']))
    {
        $author=$_POST['ident'];
        $title=$_POST['title'];
        $text=$_POST['text'];
        $filename=$_FILES['uploaded_file']['name'];

        $filenameunc=$filename;

        $filename = str_replace(' ', '_', $filename);

        $random = random_int(100000000, 999999999);
        $filename = "$random-$filename";

        $detail = str_replace(chr(13),"<br/>", $detail);

        $datestamp = date("Y-m-d");
        $timestamp = date("H:i");

        if(!empty($_FILES['uploaded_file']))
        {
            $path = "../../files/announcements/";
            $path = $path . basename( $filename);
            if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path))
            {
                $sql = "INSERT INTO announcements (title, excerp, author, date, time, datapath, filename) VALUES ('$title', '$text', '$author', '$datestamp', '$timestamp', '$path', '$filenameunc')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                    header('location: ../../app/?page=announcements');
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

            } else {
                $sql = "INSERT INTO announcements (title, excerp, author, date, time) VALUES ('$title', '$text', '$author', '$datestamp', '$timestamp')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                    header('location: ../../app/?page=announcements');
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
    }
    $conn->close();

} else if ($_GET['add-filemanager-folder'] == 1) {

    if(isset($_POST['submit']))
    {
        $infolder=$_POST['folderid'];
        $foldertitle=$_POST['foldername'];

        $sql = "INSERT INTO fm_folder (foldername, folderisinfolderid) VALUES ('$foldertitle', '$infolder')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            $location = "location: ../../app/?page=filemanager&folder=$infolder";
            header($location);
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
} else if ($_GET['add-filemanager'] == 1)
{
    foreach($_FILES['uploaded_file']['tmp_name'] as $key => $tmp_name )
    {
		$random = random_int(100000000, 999999999);
		$datestamp = date("Y-m-d");
        $timestamp = date("H:i");
        $uploader = $_POST['ident'];
        $infolder = $_POST['folderid'];

	   	$file_name = $_FILES['uploaded_file']['name'][$key];
	   	$file_size = $_FILES['uploaded_file']['size'][$key];
	   	$file_tmp = $_FILES['uploaded_file']['tmp_name'][$key];
	   	$file_type = $_FILES['uploaded_file']['type'][$key];

        $filenameunc = $file_name;
        $file_name = str_replace(' ', '_', $file_name);
        $file_name = md5($file_name);
        $file_name = "$file_name-$random";

        $path = "../../files/filemanager/";
        $path = $path . basename( $file_name);

        $path2 = "./../files/filemanager/";
        $path2 = $path2 . basename( $file_name);

	   	if(move_uploaded_file($file_tmp, $path))
	   	{
			$sql = "INSERT INTO fm_files (filename, path, uploaddate, uploadtime, uploadfrom, infolder, size, filetype) VALUES ('$filenameunc', '$path2', '$datestamp', '$timestamp', '$uploader', '$infolder', '$file_size', '$file_type')";

            if ($conn->query($sql) === TRUE)
            {
                echo "New record created successfully";
                $location = "location: ../../app/?page=filemanager&folder=$infolder";
                header($location);
            }
            else
            {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
       	}
    }
    $conn->close();

} else if ($_GET['update-event']  == 1) {

    if(isset($_POST['submit']))
    {
        $matchid=$_POST['ident'];
        $game=$_POST['game'];
        $date=$_POST['date'];
        $time=$_POST['time'];
        $todate=$_POST['todate'];
        $totime=$_POST['totime'];
        $league=$_POST['league'];
        $link=$_POST['link'];
        $logo=$_POST['logo'];
        $display=$_POST['customControlInline'];

        $sql = "UPDATE events SET game='$game', date='$date', time='$time', todate='$todate', totime='$totime', name='$league', link='$link', logo='$logo', display='$display' WHERE id='$matchid'";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header('location: ../../app/?page=events');
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
    else if(isset($_POST['reset']))
    {
        $eventid = $_POST['ident'];
        $sql = "UPDATE events SET deleted='1' WHERE id='$eventid'";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header('location: ../../app/?page=events');
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
    else if(isset($_POST['finish']))
    {
        $eventid = $_POST['ident'];
        $sql = "UPDATE events SET finished='1' WHERE id='$eventid'";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header('location: ../../app/?page=events');
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
} else if ($_GET['update-press']  == 1) {

    if(isset($_POST['submit']))
    {
        $author=$_POST['author'];
        $date=$_POST['date'];
        $title=$_POST['title'];
        $excerp=$_POST['excerp'];
        $url=$_POST['url'];
        $pressid=$_POST['ident'];

        $entitle = utf8_decode($title);
        $enexcerp = utf8_decode($excerp);

        $sql = "UPDATE press_releases SET author='$author', date='$date', title='$entitle', excerp='$enexcerp', url='$url' WHERE id='$pressid'";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header('location: ../../app/?page=press-releases');
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
    else if(isset($_POST['reset']))
    {
        $pressid = $_POST['ident'];
        $sql = "UPDATE press-releases SET deleted='1' WHERE id='$pressid'";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header('location: ../../app/?page=events');
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
} else if ($_GET['update-match'] == 1) {

    if(isset($_POST['submit']))
    {
        $matchid=$_POST['ident'];
        $adate=$_POST['date'];
        $game=$_POST['game'];
        $atime=$_POST['time'];
        $team1=$_POST['team1'];
        $team2=$_POST['team2'];
        $score1=$_POST['score1'];
        $score2=$_POST['score2'];
        $league=$_POST['league'];
        $alink=$_POST['link'];
        $result=$_POST['optradio'];
        $logo1=$_POST['team1logo'];
        $logo2=$_POST['team2logo'];
        $streamlink=$_POST['streamlink'];

        $sql = "UPDATE matches SET date='$adate', time='$atime', team1='$team1', team2='$team2', league='$league', link='$alink', score1='$score1', score2='$score2', result='$result', team1logo='$logo1', team2logo='$logo2', streamlink='$streamlink' WHERE id='$matchid'";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header('location: ../../app/?page=matches');
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
    else if(isset($_POST['reset']))
    {
        $matchid=$_POST['ident'];
        $sql = "UPDATE matches SET deleted='1' WHERE id='$matchid'";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header('location: ../../app/?page=matches');
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
} else if ($_GET['update-user']  == 1) {

    if(isset($_POST['submit']))
    {
        $memid=$_POST['ident'];
        $role=$_POST['role'];
        $password=$_POST['password'];
        $email=$_POST['email'];
        $nickname=$_POST['nickname'];
        $vorname=$_POST['vorname'];
        $nachname=$_POST['nachname'];
        $street=$_POST['street'];
        $streetno=$_POST['streetno'];
        $phonenumber=$_POST['phonenumber'];
        $stadt=$_POST['stadt'];
        $country=$_POST['country'];
        $twitter=$_POST['twitter'];
        $facebook=$_POST['facebook'];
        $plz=$_POST['plz'];
        $department=$_POST['department'];

        $filename=$_FILES['uploaded_file']['name'];

        $filename = str_replace(' ', '_', $filename);
        $random = random_int(100000000, 999999999);
        $filename = "$random-$filename";

        if(!empty($_FILES['uploaded_file']))
        {
            $path = "../../files/images/avatar/";
            $path = $path . basename( $filename);

            if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path))
            {

            }
            else { header('location: ../../app/?page=my-settings&error=upload'); }
        }

        if(!empty($_POST['password']))
        {
            $hash = md5($password);

            if($_FILES['uploaded_file']['size'] > 0)
            {
                $sql = "UPDATE member SET password='$hash', email='$email', role='$role', nickname='$nickname', firstname='$vorname', lastname='$nachname', street='$street', streetno='$streetno', phoneno='$phonenumber', city='$stadt', country='$country', twitter='$twitter', facebook='$facebook', plz='$plz', department='$department', avatar='$path' WHERE mem_id='$memid'";
            }
            else
            {
                $sql = "UPDATE member SET password='$hash', email='$email', role='$role', nickname='$nickname', firstname='$vorname', lastname='$nachname', street='$street', streetno='$streetno', phoneno='$phonenumber', city='$stadt', country='$country', twitter='$twitter', facebook='$facebook', plz='$plz', department='$department' WHERE mem_id='$memid'";
            }
        }
        else
        {
            if($_FILES['uploaded_file']['size'] > 0)
            {
                $sql = "UPDATE member SET email='$email', nickname='$nickname', role='$role', firstname='$vorname', lastname='$nachname', street='$street', streetno='$streetno', phoneno='$phonenumber', city='$stadt', country='$country', twitter='$twitter', facebook='$facebook', plz='$plz', department='$department', avatar='$path' WHERE mem_id='$memid'";
            }
            else
            {
                $sql = "UPDATE member SET email='$email', nickname='$nickname', role='$role', firstname='$vorname', lastname='$nachname', street='$street', streetno='$streetno', phoneno='$phonenumber', city='$stadt', country='$country', twitter='$twitter', facebook='$facebook', plz='$plz', department='$department' WHERE mem_id='$memid'";
            }
        }

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header('location: ../../app/?page=accounts');
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
    else if(isset($_POST['reset']))
    {
        $memid = $_POST['ident'];
        $sql = "UPDATE member SET deleted='1' WHERE mem_id='$memid'";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header('location: ../../app/?page=accounts');
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
} else if ($_GET['update-my-profile']  == 1) {

    if(isset($_POST['submit']))
    {
        $memid=$_POST['ident'];
        $password=$_POST['password'];
        $email=$_POST['email'];
        $nickname=$_POST['nickname'];
        $vorname=$_POST['vorname'];
        $nachname=$_POST['nachname'];
        $street=$_POST['street'];
        $streetno=$_POST['streetno'];
        $phonenumber=$_POST['phonenumber'];
        $stadt=$_POST['stadt'];
        $country=$_POST['country'];
        $twitter=$_POST['twitter'];
        $facebook=$_POST['facebook'];
        $plz=$_POST['plz'];
        $department=$_POST['department'];

        $filename=$_FILES['uploaded_file']['name'];

        $filename = str_replace(' ', '_', $filename);
        $random = random_int(100000000, 999999999);
        $filename = "$random-$filename";

        if(!empty($_FILES['uploaded_file']))
        {
            $path = "../../files/images/avatar/";
            $path = $path . basename( $filename);

            if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path))
            {

            }
            else { header('location: ../../app/?page=my-settings&error=upload'); }
        }

        if(!empty($_POST['password']))
        {
            $hash = md5($password);

            if($_FILES['uploaded_file']['size'] > 0)
            {
                $sql = "UPDATE member SET password='$hash', email='$email', nickname='$nickname', firstname='$vorname', lastname='$nachname', street='$street', streetno='$streetno', phoneno='$phonenumber', city='$stadt', country='$country', twitter='$twitter', facebook='$facebook', plz='$plz', department='$department', avatar='$path' WHERE mem_id='$memid'";
            }
            else
            {
                $sql = "UPDATE member SET password='$hash', email='$email', nickname='$nickname', firstname='$vorname', lastname='$nachname', street='$street', streetno='$streetno', phoneno='$phonenumber', city='$stadt', country='$country', twitter='$twitter', facebook='$facebook', plz='$plz', department='$department' WHERE mem_id='$memid'";
            }
        }
        else
        {
            if($_FILES['uploaded_file']['size'] > 0)
            {
                $sql = "UPDATE member SET email='$email', nickname='$nickname', firstname='$vorname', lastname='$nachname', street='$street', streetno='$streetno', phoneno='$phonenumber', city='$stadt', country='$country', twitter='$twitter', facebook='$facebook', plz='$plz', department='$department', avatar='$path' WHERE mem_id='$memid'";
            }
            else
            {
                $sql = "UPDATE member SET email='$email', nickname='$nickname', firstname='$vorname', lastname='$nachname', street='$street', streetno='$streetno', phoneno='$phonenumber', city='$stadt', country='$country', twitter='$twitter', facebook='$facebook', plz='$plz', department='$department' WHERE mem_id='$memid'";
            }
        }

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header('location: ../../app/?page=profiles');
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
} else if($_GET['add-user'] == 1) {

    if(isset($_POST['submit']))
        {
            $name=$_POST['name'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $role=$_POST['role'];
            $vorname=$_POST['vorname'];
            $nachname=$_POST['nachname'];
            $nickname=$_POST['nickname'];
            $avatar="../../files/images/avatar/454104837-no-avatar.jpg";
            $street=$_POST['street'];
            $streetno=$_POST['streetno'];
            $phonenumber=$_POST['phonenumber'];
            $stadt=$_POST['stadt'];
            $country=$_POST['country'];
            $twitter=$_POST['twitter'];
            $facebook=$_POST['facebook'];
            $plz=$_POST['plz'];
            $department=$_POST['department'];


            $hash = md5($password);

            $sql = "INSERT INTO member (username, email, password, role, avatar, firstname, lastname, street, streetno, phoneno, city, country, twitter, facebook, plz, department, nickname) VALUES ('$name', '$email', '$hash', '$role', '$avatar', '$vorname', '$nachname', '$street', '$streetno', '$phoneno', '$city', '$stadt', '$twitter', '$facebook', '$plz', '$department', '$nickname')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                header ('Location: ../../app/?page=accounts');
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
} else if ($_GET['removefilefromfm'] == 1) {

    $fileid=$_GET['fileid'];
    $returnurl=$_GET['url'];
    $folder=$_GET['folder'];
    $sql = "UPDATE fm_files SET deleted='1' WHERE fileid='$fileid'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        $location = "Location: $returnurl&folder=$folder";
        header($location);
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();
} else if ($_GET['removefolderfromfm'] == 1) {

    $fileid=$_GET['folderid'];
    $returnurl=$_GET['url'];
    $sql = "UPDATE fm_folder SET deleted='1' WHERE folderid='$fileid'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        $location = "Location: $returnurl&folder=$folder";
        header($location);
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();
} else if ($_GET['finishtask'] == 1) {

    $returnurl=$_GET['url'];
    $taskid=$_GET['taskid'];
    $sql = "UPDATE tasks SET finished='1' WHERE id='$taskid'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        $location = "Location: $returnurl";
        header($location);
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();
} else if ($_GET['add-team'] == 1) {

    if(isset($_POST['submit']))
    {
        $name=$_POST['name'];
        $ident=$_POST['ident'];
        $country=$_POST['country'];
        $filename=$_FILES['uploaded_file']['name'];

        $ident = str_replace(' ', '-', $ident);

        $filenameunc=$filename;

        $filename = str_replace(' ', '_', $filename);

        $random = random_int(100000000, 999999999);

        $filename = "$random-$filename";


        //Check if name or identifier exists
        $sql = "SELECT * FROM teams WHERE name='$name' AND deleted='0'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) { header('location: ../../app/?page=teams-add&error=name'); exit; }

        $sql = "SELECT * FROM teams WHERE identifier='$ident' AND deleted='0'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) { header('location: ../../app/?page=teams-add&error=identifier'); exit; }

        if(!empty($_FILES['uploaded_file']))
        {
            $path = "../../files/images/teamlogo/";
            $path = $path . basename( $filename);
            if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path))
            {
                $sql = "INSERT INTO teams (name, identifier, country, logo) VALUES ('$name', '$ident', '$country', '$path')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                    header('location: ../../app/?page=teams');
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

            } else {
                $sql = "INSERT INTO teams (name, identifier, country, logo) VALUES ('$name', '$ident', '$country', '../../files/images/teamlogo/no-image.png')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                    header('location: ../../app/?page=teams');
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
    }
    $conn->close();

} else if ($_GET['edit-team'] == 1) {

    if(isset($_POST['submit']))
    {
        $name=$_POST['name'];
        $ident=$_POST['ident'];
        $country=$_POST['country'];
        $teamid=$_POST['teamid'];
        $filename=$_FILES['uploaded_file']['name'];

        $filenameunc=$filename;

        $filename = str_replace(' ', '_', $filename);

        $random = random_int(100000000, 999999999);

        $filename = "$random-$filename";

        if(!empty($_FILES['uploaded_file']))
        {
            $path = "../../files/images/teamlogo/";
            $path = $path . basename( $filename);
            if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path))
            {
                $sql = "UPDATE teams SET name='$name', identifier='$ident', country='$country', logo='$path' WHERE id='$teamid'";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                    header('location: ../../app/?page=teams');
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

            } else {
                $sql = "UPDATE teams SET name='$name', identifier='$ident', country='$country' WHERE id='$teamid'";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                    header('location: ../../app/?page=teams');
                } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
    }
    else if(isset($_POST['reset']))
    {
        $teamid=$_POST['teamid'];
        $sql = "UPDATE teams SET deleted='1' WHERE id='$teamid'";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            header('location: ../../app/?page=teams');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();

} else if ($_GET['add-reporting'] == 1) {

    if(isset($_POST['submit']))
    {
        $author=$_POST['ident'];
        $title=$_POST['title'];
        $text=$_POST['text'];
        $date=$_POST['date'];
        $league=$_POST['league'];
        $filename=$_FILES['uploaded_file']['name'];

        $filenameunc=$filename;

        $filename = str_replace(' ', '_', $filename);

        $random = random_int(100000000, 999999999);
        $filename = "$random-$filename";

        $text = str_replace(chr(13),"<br/>", $text);

        $text = utf8_decode($text);

        if(!empty($_FILES['uploaded_file']))
        {
            $path = "../../files/reportings/";
            $path = $path . basename( $filename);
            if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path))
            {
                $sql = "INSERT INTO reportings (title, text, author, date, saveurl, file_name, event) VALUES ('$title', '$text', '$author', '$date', '$path', '$filenameunc', '$league')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                    header('location: ../../app/?page=reportings');
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
            }

            } else {
                echo "There was an error uploading the file, please try again!";
            }
        }
    }
    $conn->close();

}

?>
