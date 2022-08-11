<?php
// dynamic table
// dynamic rows //4 
// dynamic columns // 4
// check if gender of user == m ==> male // 1
// check if gender of user == f ==> female // 1

$users = [
    (object)[
        'id' => 1,
        'name' => 'ahmed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'football', 'swimming', 'running'
        ],
        'activities' => [
            "school" => 'drawing',
            'home' => 'painting'
        ],
        'phones'=>[012312312,1231513513,89746543],
    ],
    (object)[
        'id' => 2,
        'name' => 'mohamed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'swimming', 'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ],
        'phones'=>[1231513513,89746543],
    ],
        (object)[
        'id' => 3,
        'name' => 'menna',
        "gender" => (object)[
            'gender' => 'f'
        ],
        'hobbies' => [
            'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ],
        'phones'=>[],
    ],  
];

?>


<html>
  
    <head>
       <meta charset="utf-8">
       <title>daynamic table</title> 
       <link rel="stylesheet" href="style.css" > 
   
    </head>
  
    
     <body>

        <table border=1>
            <caption>Users</caption>   
      
            <tr>         
            <?php
            foreach($users[0] as $key =>$values)  //echo keys
            {   echo"<th>" ;
              echo $key ;
              echo "</th>";
            }?>
            </tr>
     

                  
                     
            <?php
             

             $table_size=sizeof($users);
            
            
            for($counter=0;$counter<$table_size;$counter++)
            {
                echo "<tr>";
            
            foreach($users[$counter] as $key =>$values)
            {   
                echo"<th>" ;

                if(is_array($values) )
                {
                  foreach($values as $value)
                  {
                    echo $value;
                    echo'<br>';
                  } 
                
                }

                elseif (gettype($values)=="object")
                {
                    foreach($values as $value)
                  {
                    if ($value=='f'||$value=='F')
                    {
                    echo $value='Female';
                    echo'<br>';
                    }
                    else
                    { echo $value='male';

                    }
                  } 
                }

                else
                { 
                   echo $values ;
                }

                
                echo "</th>";
            }
               echo "</tr>";
            } 
        
            ?>
            
        </table>
 
        
   
      </body>
 </html>