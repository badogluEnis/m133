<?php
session_destroy();
header('location: ?function=blogs&bid='.$blogId.'');
?>