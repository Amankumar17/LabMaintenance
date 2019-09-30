<?php

$results = DB::select('select * from student_login');
echo 'Successful';
echo $results;

?>