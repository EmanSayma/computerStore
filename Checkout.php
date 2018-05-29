<?php
class Product
 {
    public $SKU;
    public $Name;
    public $Price;

    /**
     * Create a new Product instance.
     */

    public function __construct($SKU, $Name, $Price)
     {
    	$this->SKU= $SKU;
        $this->Name = $Name;
        $this->Price = $Price;
     }
}  
///////////////////////////////////////////////////////////////
 /**
     * Create Interface for Discount
     */
interface IDiscount
 {
  public function apply(&$items,&$total);
}

/////////////////////////////////////////////////////////////
class AppleTVDiscount implements IDiscount
 {
   /**
     * implements the IDiscount interface function
     */
  public function apply(&$items,&$total) 
  {
  	 $count=0;
  	 $times= 0;
    foreach ($items as $item)
     {
    	if( $item->SKU == 'atv')
    	{
    		$count++;
    	}   
    }

    $times= intval($count/3);
      if($times>0 && $count%3 == 0)
      {
         $total -= 109.50* $times;
      }
  }
}
///////////////////////////////////////////////////////////////////
class SuperiPadDiscount implements IDiscount 
{
     /**
     * implements the IDiscount interface function
     */
  public function apply(&$items,&$total) 
  {
  	 $count=0;

    foreach ($items as $item)
     {
    	if( $item->SKU == 'ipd')
    	{
    		$count++;
    	}
    }
    	if($count > 4)
    	{
    		foreach($items as $item)
    		{
    		   if( $item->SKU == 'ipd')
         	   {
    		     $total-= 50;
    	       }
    		}    		
    	}
   
  }
}
///////////////////////////////////////////////////////////
class MacBookDiscount implements IDiscount 
{
     /**
     * implements the IDiscount interface function
     */
  public function apply(&$items,&$total) 
  {
  	 $count=0;

    foreach ($items as $item)
     {
    	  if( $item->SKU == 'mbp')
    	  {
          array_push($items, new Product('vga','VGA adapter',0) );
       	}
      }    
    }
}

/////////////////////////////////////////////////////////////////

class Checkout{
	public $total;
    public  $items;
     private $discounts = [];
  
  /**
     * Create a new checkout instance.
     */

	public function __construct()
	{
		$this->total = 0;
		$this->items = array();
		echo '<div class="card-header">New Checkout menu</div>';

	}

  /**
     * scan new item to the checkout list
     *
     * @param {Object} Product item
     */

	public function scan($item)
	{
        array_push($this->items, $item);
	}

 /**
     * calculate total before discount and print list items
     *
     * 
     */

	public function totalBeforeDiscount()
	{
      echo '<h3>SKUs Scanned: </h3>';
      foreach($this->items as $item)
      {
       echo $item->Name . ' , ';
      	$this->total+= $item->Price;
      }
       echo '<h3> Total before discount : $'. $this->total .'</h3>';  

	}

   /**
     * add new discount to the checkout list
     *
     * @param {Object} IDiscount
     */

	public function addDiscount(IDiscount $discount) 
	  {
      $this->discounts[] = $discount;
      }

        /**
     * calculate total after discount and print list items
     *
     * 
     */


	public function totalAfterDiscount() 
	{
    foreach($this->discounts as $discount)
      $discount->apply($this->items, $this->total);
      echo '<h3>SKUs Scanned with Free products: </h3>';
      foreach($this->items as $item)
      {
        echo $item->Name . ' , ';
      }
    echo '<h3> price after discount : $'. $this->total. '</h3>';
  }
}

/////////////////////////////////////////////////////////////

 
////////////////////////////////////////////////////////////////////
$co= new Checkout();
$co->scan(new Product('atv','Apple TV',109.50  ));
$co->scan(new Product('atv','Apple TV',109.50  ));
$co->scan(new Product('atv','Apple TV',109.50  ));
$co->scan(new Product('vga','VGA adapter',30.00  ));
$co->addDiscount(new AppleTVDiscount());
$co->addDiscount(new SuperiPadDiscount());
$co->addDiscount(new MacBookDiscount());
$co->totalBeforeDiscount();
$co->totalAfterDiscount();

///////////////////////////////////////////////////////////
$co2= new Checkout();
$co2->scan(new Product('mbp','MacBook Pro',1399.99  ));
$co2->scan(new Product('ipd','Super iPad',549.99 ));
$co2->addDiscount(new AppleTVDiscount());
$co2->addDiscount(new SuperiPadDiscount());
$co2->addDiscount(new MacBookDiscount());
$co2->totalBeforeDiscount();
$co2->totalAfterDiscount();

/////////////////////////////////////////////////////////
$co3= new Checkout();
$co3->scan(new Product('atv','Apple TV',109.50  ));
$co3->scan(new Product('ipd','Super iPad',549.99 ));
$co3->scan(new Product('ipd','Super iPad',549.99 ));
$co3->scan(new Product('atv','Apple TV',109.50  ));
$co3->scan(new Product('ipd','Super iPad',549.99 ));
$co3->scan(new Product('ipd','Super iPad',549.99 ));
$co3->scan(new Product('ipd','Super iPad',549.99 ));
$co3->addDiscount(new AppleTVDiscount());
$co3->addDiscount(new SuperiPadDiscount());
$co3->addDiscount(new MacBookDiscount());
$co3->totalBeforeDiscount();
$co3->totalAfterDiscount();