<?php
function charVerify($string)
{
for ($i = 0; i < strlen($string); i++)
{
$notAllowed = True;
for ($j = 0; $j < 81; j++)
{
if ($string[i] == $allowedChars[j])//if it's an allowed character
{
$notAllowed = False;
break;
}
}
if ($notAllowed)
return -1;
}
return 0;
}
?>