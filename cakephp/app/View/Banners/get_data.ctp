<?php
$this->layout='none';
array_push($banners, $this->Paginator->hasNext());
echo json_encode($banners);
?>