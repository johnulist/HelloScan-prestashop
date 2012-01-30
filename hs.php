<?php 

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4 ff=unix fenc=utf8: */

/**
*
* HelloScan for PrestaShop
*
* @package HelloScan_PrestaShop
* @author Yves Tannier [grafactory.net]
* @copyright 2011 Yves Tannier
* @link http://helloscan.mobi
* @license MIT Licence
*/

// config & init PrestaShop
include(dirname(__FILE__).'/../../config/config.inc.php');
include_once(dirname(__FILE__).'/../../init.php');

// debug ?
define('HELLOSCAN_DEBUG', false);

// check authkey
if(empty($_GET['authkey']) || Configuration::get('helloscan_authkey',NULL)!=$_GET['authkey']) {
    echo 'Incorrect authkey';
    exit;
} else {
    $hs_authkey = Configuration::get('helloscan_authkey',NULL);
}

// url prestashop
$hs_url_prestashop = Tools::getShopDomain('true');
$hs_url_prestashop_ssl = Tools::getShopDomainSsl('true');

$hs_path = $_SERVER['SCRIPT_NAME'];
$hs_module_path = str_replace(__PS_BASE_URI__, '', $hs_path);
$hs_module_path = str_replace('hs.php', '', $hs_module_path);

$hs_url_module = $hs_url_prestashop.'/'.$hs_module_path;

header ('Content-Type:text/xml'); 
?> 
<helloscan>
    <button>
        <label value="Scanner"></label>
        <url value="<?php echo $hs_url_module; ?>scan.php?authkey=<?php echo $hs_authkey; ?>&amp;code=&lt;id&gt;&amp;action=get"></url>
        <action value="true"></action>
        <color value="buttonRed"></color>
    </button>
    <button>
        <label value="Incrémenter"></label>
        <url value="<?php echo $hs_url_module; ?>scan.php?authkey=<?php echo $hs_authkey; ?>&amp;code=&lt;id&gt;&amp;action=add"></url>
        <action value="false"></action>
    </button>
    <button>
        <label value="Décrémenter"></label>
        <url value="<?php echo $hs_url_module; ?>scan.php?authkey=<?php echo $hs_authkey; ?>&amp;code=&lt;id&gt;&amp;action=remove"></url>
        <action value="false"></action>
    </button>
</helloscan>