<?php

assert_options(ASSERT_ACTIVE,FALSE);
assert_options(ASSERT_BAIL  ,FALSE);
date_default_timezone_set ("America/Los_Angeles");
set_include_path(".:".$_SERVER["DOCUMENT_ROOT"]);

if (!session_start()) throw new Exception("A session could not be started.");
assert (isset($_SESSION));

include "resources/extensions/custom.php";
include "resources/extensions/preload.php";

?>