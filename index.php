<?php
include("header.php");

$clients = array();
$i = 1;

while($i < 8) {

$clients[$i]['pk'] = 'pk' . $i;
$clients[$i]['business_name'] = 'Business Name ' . $i;
$clients[$i]['name_on_tax_return'] = 'Business Name';
$clients[$i]['taxpayer_id_number'] = '1234567' . $i;

$clients[$i]['parent_company'] = 'Another Business Name';
$clients[$i]['parent_ein'] = '9876543' . $i;

$clients[$i]['vendor_type'] = 'External-Supplier';
$i %2 == 0 ? $clients[$i]['status'] = 'Active' : $clients[$i]['status'] = 'Inactive';

// NOTE: need to retrieve() via lookup
$clients[$i]['liaison'] = 'George Michael Bluth';
$clients[$i]['liaison_email'] = 'bluthg@advisory.com';

$clients[$i]['street'] = '1' . $i. '00 M Street, NW'; 
$clients[$i]['city'] = 'Washington';
$clients[$i]['state'] = 'DC';
$clients[$i]['zip'] = '2003' . $i;

$clients[$i]['secondary_name'] = 'New York Office'; 
$clients[$i]['secondary_street'] = '5' . $i. '54 Z Street'; 
$clients[$i]['secondary_city'] = 'Manhattan';
$clients[$i]['secondary_state'] = 'NY';
$clients[$i]['secondary_zip'] = '2765' . $i;

$clients[$i]['phone'] = '(202) 234-567' . $i;
$clients[$i]['fax'] = '(202) 456-234' . $i;
$clients[$i]['website'] = 'www.abc' . $i . 'company.com';

$clients[$i]['bank_name'] = 'Bank of Montreal (BMO)';
$clients[$i]['routing_no'] = '123-34567-0' . $i;
$clients[$i]['account_no'] = '7436244' . $i;
$i %2 == 0 ? $clients[$i]['credit_cards_accepted'] = 1 : $clients[$i]['credit_cards_accepted'] = 0;
$clients[$i]['remittance_email'] = 'payushere@business.com';

$clients[$i]['description'] = 'This is a description of the business.  You know, we do this and that and sometimes even there.  We can ensure that we can do what you need, when you want it.';

$clients[$i]['dba_name'] = 'Other Company'; 
$clients[$i]['dba_formername'] = 'Other Company 2'; 
$clients[$i]['dba_EIN'] = '543543542'; 
$clients[$i]['dba_street'] = '5' . $i. '54 Z Street'; 
$clients[$i]['dba_city'] = 'Manhattan';
$clients[$i]['dba_state'] = 'NY';
$clients[$i]['dba_zip'] = '2765' . $i;

$clients[$i]['nda_attached'] = 1;


$i++;
}

//echo "<pre>"; print_r($clients); echo "</pre>";

?>
<div class="vendors">
	<h2>Vendor List</h2>
	<span class="info">click vendor for more info</span>
	<input type="text" name="vendorsearch" value="" id="vendorsearch" placeholder="search all vendors" />
	<ul id="isotope-container">
		<?php foreach($clients as $key => $cl) {
		if($cl['vendor_type'] != 'External-Supplier') break;
		?>
		<li class="item vendorclick" id="<?php echo $cl['pk']; ?>">
			<div class="vendor">
				<h3><?php echo $cl['business_name']; ?></h3>
				<h4 class="<?php echo $cl['status'] == 'Active' ? 'green' : 'red'; ?>"><?php echo $cl['status']; ?></h4>
			</div>
		</li>
		<?php } ?>
		<li class="noresults">	<div class="vendor">Please refine your search, as there are no results!</div></li>
	</ul>
		<?php foreach($clients as $key => $cl) { // second loop for lightboxes ?>
			<div class="popups" id="<?php echo $cl['pk']; ?>">
			<div class="overlay"></div>
			<div class="moreinfo">
			<div class="x">close</div>
			
				<h2><?php echo $cl['business_name']; ?> - <span class="<?php echo $cl['status'] == 'Active' ? 'green' : 'red'; ?>"><?php echo $cl['status']; ?></span></h2>
				<p><?php echo $cl['description']; ?></p>
				<div class="vendorinfo">
					<h5>Primary Address:</h5>
					<address>
						<?php echo $cl['street']; ?><br/>
						<?php echo $cl['city']; ?>,&nbsp<?php echo $cl['state']; ?>&nbsp;<?php echo $cl['zip']; ?>
					</address>
					<?php if(isset($cl['secondary_street'])) { ?>
						<h5>Secondary Address:</h5>
						<address>
							<strong><?php echo $cl['secondary_name']; ?></strong><br/>
							<?php echo $cl['secondary_street']; ?><br/>
							<?php echo $cl['secondary_city']; ?>,&nbsp<?php echo $cl['secondary_state']; ?>&nbsp;<?php echo $cl['secondary_zip']; ?>			
						</address>
					<?php } ?>
					<p>
						<strong>Phone:</strong> <?php echo $cl['phone']; ?><br/>
						<strong>Fax:</strong> <?php echo $cl['fax']; ?><br/>
						<a href="<?php echo $cl['website']; ?>" target="_blank"><?php echo $cl['website']; ?></a>						
					</p>
				</div>	
				
				<div class="vendorinfo">
					<p>
						<?php if(isset($cl['name_on_tax_return'])) { ?>
							<strong>Name on Tax Return: </strong><?php echo $cl['name_on_tax_return']; ?><br/>
						<?php } ?>	
							<strong>Taxpayer ID: </strong><?php echo $cl['taxpayer_id_number']; ?><br/>
							<strong>Advisory Board Liaison: </strong><a href="mailto:<?php echo $cl['liaison_email']; ?>"><?php echo $cl['liaison']; ?></a>
					</p>
					<?php /* if(isset($cl['parent_company'])) { ?>
						<h5>Parent Company</h5>
						<p>
							<?php echo $cl['parent_company']; ?><br/>
							<strong>EIN: </strong><?php echo $cl['parent_ein']; ?>
						</p>
					<?php } */ ?>
					<?php /*
					<h5>Electronic Payment Information:</h5>
						<p>
							<strong>Bank Name: </strong><?php echo $cl['bank_name']; ?><br/>
							<strong>Routing No: </strong><?php echo $cl['routing_no']; ?><br/>
							<strong>Account No: </strong><?php echo $cl['account_no']; ?><br/>
							Credit Cards <?php echo $cl['credit_cards_accepted'] == 1 ? "ARE" : "are NOT"; ?> accepted.<br/>
							<strong>Remittance Email: </strong><a href="mailto:<?php echo $cl['remittance_email']; ?>"><?php echo $cl['remittance_email']; ?></a>
						</p>
					*/ ?>
				</div>	
				
				<form action="" method="post" id="contract">
				<input type="submit" value="Create Contract / Purchase Request" class="button" name="submit2" />
				</form>
	
			</div>
			
		</div>
	<?php } ?>
	</div>


<?php include("footer.php"); ?>