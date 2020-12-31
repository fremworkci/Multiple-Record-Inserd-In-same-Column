view :-
<form method="post" action="<?php echo base_url().'User/img' ?>" enctype="multipart/form-data">
<div class="form-group">
	<label>Pancard</label>
	<input type="text" name="pan[]" class="form-control">
	<input type="text" name="pan[]" class="form-control">
</div>

<div class="form-group">
	<label>Adhar</label>
	<input type="text" name="adhar[]" class="form-control">
	<input type="text" name="adhar[]" class="form-control">
</div>
<input type="submit" name="submit" value="Insert">
</form>



Controller:-
<?php
function img()
{
	$pan=$this->input->post("pan");
	$adhar=$this->input->post("adhar");
	$name="suman";
	$data=array("name"=>$name);
	$insert_id=$this->Model1->insert_rec($data);   //sirf name insert kar raha hu

	for($i=0;$i<count($pan);$i++)
	{
		// $pan=$pan[$i];
		// $adhar=$adhar[$i];
		// $iid=$insert_id;
		$dat=array(
			"pan"=>$pan[$i],
			"adhar"=>$adhar[$i],
			"iid"=>$insert_id
		);
		$this->Model1->pan_model($dat);  //array value insert
	}
}

?>


Model :-
<?php

function insert_rec($data)
{
	$this->db->insert("login",$data);
	return $this->db->insert_id();
}

function pan_model($dat)
{
	$this->db->insert("image",$dat);
}
?>
