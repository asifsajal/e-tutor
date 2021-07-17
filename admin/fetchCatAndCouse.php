<?php include 'libraries/session.php';
Session::checkSession(); ?>
<?php
include 'config/config.php';
$product_category = ($_REQUEST["product_category"] <> "") ? trim($_REQUEST["product_category"]) : "";
if ($product_category <> "") {
    $sql = "SELECT * FROM application_sub_category WHERE catID_In_subCat  = :cid ORDER BY subCat_id";
    try {
        $stmt = $DB->prepare($sql);
        $stmt->bindValue(":cid", trim($product_category));
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo($ex->getMessage());
    }
    if (count($results) > 0) {
        ?><div >
        <td>
            <select required name="SubCat"  onchange="showCity(this);">
                <option value="">Please Select</option>
                <?php foreach ($results as $rs) { ?>
                    <option value="<?php echo $rs["subCat_id"]; ?>"><?php echo $rs["subCat_Name"]; ?></option>
                <?php } ?>
            </select>
        </td></div>
        <?php
    }}
?>
