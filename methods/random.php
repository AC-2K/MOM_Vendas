<?php

$hashed = password_hash("teste", PASSWORD_BCRYPT);
echo $hashed;