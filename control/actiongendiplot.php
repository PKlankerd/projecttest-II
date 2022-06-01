<?php 

$connect = new PDO("mysql:host=localhost;dbname=ansell","root","");
$received_data = json_decode(file_get_contents("php://input"));
$data = array();

if($received_data->actions == 'update')
{  
    $query = "INSERT INTO dipping_lot (Binno,Productcode,Productionlot,SizeHand,Glovecolor,MachineRunNo,TotalGlove,Operator)
    value (:insertbinno,:insertproduct,:insertproductlot,:insertsizehand,:insertcolor,:insertrun,:inserttotal,:insertoperator)";
    $statement = $connect->prepare($query);

    $statement->bindValue(":insertbinno", $received_data->insertbinno);
    $statement->bindValue(":insertproduct", $received_data->insertproduct);
    $statement->bindValue(":insertproductlot", $received_data->insertproductlot);
    $statement->bindValue(":insertsizehand", $received_data->insertsizehand);
    $statement->bindValue(":insertcolor", $received_data->insertcolor);
    $statement->bindValue(":insertrun", $received_data->insertrun);
    $statement->bindValue(":inserttotal", $received_data->inserttotal);
    $statement->bindValue(":insertoperator", $received_data->insertoperator);
    $statement->execute();
  
    foreach ($received_data->updates as $res) 
    {
    $query = "UPDATE dipping_lot_batch_l SET 
        Batch1 = :b1,amt1 = :a1,
        Batch2 = :b2,amt2 = :a2,
        Batch3 = :b3,amt3 = :a3,
        Batch4 = :b4,amt4 = :a4,
        Batch5 = :b5,amt5 = :a5,
        Batch6 = :b6,amt6 = :a6,
        TotalPcs = :tp, ProductionLot = :insertproductlot WHERE DippingLot_L = :dipl";
    $statement = $connect->prepare($query);
    $statement->bindValue(":b1", $res->Batch1);
    $statement->bindValue(":a1", $res->amt1);
    $statement->bindValue(":b2", $res->Batch2);
    $statement->bindValue(":a2", $res->amt2);
    $statement->bindValue(":b3", $res->Batch3);
    $statement->bindValue(":a3", $res->amt3);
    $statement->bindValue(":b4", $res->Batch4);
    $statement->bindValue(":a4", $res->amt4);
    $statement->bindValue(":b5", $res->Batch5);
    $statement->bindValue(":a5", $res->amt5);
    $statement->bindValue(":b6", $res->Batch6);
    $statement->bindValue(":a6", $res->amt6);
    $statement->bindValue(":tp", $res->TotalPcs);
    $statement->bindValue(":insertproductlot", $received_data->insertproductlot);
    $statement->bindValue(":dipl", $res->DippingLot_L);
    $statement->execute();
    }
      $output = array(
        'message' => json_decode($res)
    );  
}

if($received_data->actions == 'updateR')
{  
    $query = "INSERT INTO dipping_lot (Binno,Productcode,Productionlot,SizeHand,Glovecolor,MachineRunNo,TotalGlove,Operator)
    value (:insertbinno,:insertproduct,:insertproductlot,:insertsizehand,:insertcolor,:insertrun,:inserttotal,:insertoperator)";
    $statement = $connect->prepare($query);

    $statement->bindValue(":insertbinno", $received_data->insertbinno);
    $statement->bindValue(":insertproduct", $received_data->insertproduct);
    $statement->bindValue(":insertproductlot", $received_data->insertproductlot);
    $statement->bindValue(":insertsizehand", $received_data->insertsizehand);
    $statement->bindValue(":insertcolor", $received_data->insertcolor);
    $statement->bindValue(":insertrun", $received_data->insertrun);
    $statement->bindValue(":inserttotal", $received_data->inserttotal);
    $statement->bindValue(":insertoperator", $received_data->insertoperator);
    $statement->execute();
  
    foreach ($received_data->updatesR as $res) 
    {
    $query = "UPDATE dipping_lot_batch_r SET 
        Batch1 = :b1,amt1 = :a1,
        Batch2 = :b2,amt2 = :a2,
        Batch3 = :b3,amt3 = :a3,
        Batch4 = :b4,amt4 = :a4,
        Batch5 = :b5,amt5 = :a5,
        Batch6 = :b6,amt6 = :a6,
        TotalPcs = :tp, ProductionLot = :insertproductlot WHERE DippingLot_R = :dipR";
    $statement = $connect->prepare($query);
    $statement->bindValue(":b1", $res->Batch1);
    $statement->bindValue(":a1", $res->amt1);
    $statement->bindValue(":b2", $res->Batch2);
    $statement->bindValue(":a2", $res->amt2);
    $statement->bindValue(":b3", $res->Batch3);
    $statement->bindValue(":a3", $res->amt3);
    $statement->bindValue(":b4", $res->Batch4);
    $statement->bindValue(":a4", $res->amt4);
    $statement->bindValue(":b5", $res->Batch5);
    $statement->bindValue(":a5", $res->amt5);
    $statement->bindValue(":b6", $res->Batch6);
    $statement->bindValue(":a6", $res->amt6);
    $statement->bindValue(":tp", $res->TotalPcs);
    $statement->bindValue(":insertproductlot", $received_data->insertproductlot);
    $statement->bindValue(":insertproductlot", $received_data->insertproductlot);
    $statement->bindValue(":dipR", $res->DippingLot_R);
    $statement->execute();
    }
      $output = array(
        'message' => $res->DippingLot_R
    );
    echo json_encode($output);   

  
}
if($received_data->actions == "fetchalldata")
{
    $query ="SELECT * FROM dipping_lot_batch_r where ProductionLot = '' ";
    $statement = $connect->prepare($query);
    $statement->execute();
    while($row = $statement->fetch(PDO::FETCH_ASSOC)){
        $data[] = $row;
    }
    echo json_encode($data);
}
if($received_data->actions == "fetchall")
{
    $query ="SELECT * FROM dipping_lot_batch_l where ProductionLot = '' ";
    $statement = $connect->prepare($query);
    $statement->execute();
    while($row = $statement->fetch(PDO::FETCH_ASSOC)){
        $data[] = $row;
    }
    echo json_encode($data);
}
if($received_data->actions == "callmachinedip")
{
    $query ="SELECT * FROM machine where machine NOT like 'S%' ";
    
    $statement = $connect->prepare($query);
    $statement->execute();
    while($row = $statement->fetch(PDO::FETCH_ASSOC)){
        $data[] = $row;
    }
    echo json_encode($data);
}
if($received_data->actions == "calltime")
{
    $query ="SELECT * FROM time where timeshift  IN ('1','2','3')";
    
    $statement = $connect->prepare($query);
    $statement->execute();
    while($row = $statement->fetch(PDO::FETCH_ASSOC)){
        $data[] = $row;
    }
    echo json_encode($data);
}
if($received_data->actions == "insert"){
    $data = array(
        ':colorhand' => $received_data->test,
        
    );
    $query = "INSERT INTO dipping_lot(Glovecolor) VALUES(:colorhand)";
    $statement = $connect->prepare($query);
    $statement->execute($data);
    $output = array(
        'message' => 'Data Inserted'
    );
    echo json_encode($output);
}
if($received_data->actions == "callproductdata")
{
    $query ="SELECT * FROM product";
    
    $statement = $connect->prepare($query);
    $statement->execute();
    while($row = $statement->fetch(PDO::FETCH_ASSOC)){
        $data[] = $row;
    }
    echo json_encode($data);
}
if($received_data->actions == "callglovecolor")
{
    $query ="SELECT * FROM glovecolor";
    
    $statement = $connect->prepare($query);
    $statement->execute();
    while($row = $statement->fetch(PDO::FETCH_ASSOC)){
        $data[] = $row;
    }
    echo json_encode($data);
}
if($received_data->actions == "callmachine")
{
    $query ="SELECT * FROM machine where machine like 'S%' ";
    
    $statement = $connect->prepare($query);
    $statement->execute();
    while($row = $statement->fetch(PDO::FETCH_ASSOC)){
        $data[] = $row;
    }
    echo json_encode($data);
}
if($received_data->actions == "callsize")
{
    $query ="SELECT * FROM size";
    
    $statement = $connect->prepare($query);
    $statement->execute();
    while($row = $statement->fetch(PDO::FETCH_ASSOC)){
        $data[] = $row;
    }
    echo json_encode($data);
}
if($received_data->actions == "dataas1")
{      
    foreach ($received_data->send as $res)
    {    
        if($res%2==1)
        {            
            $query = "INSERT INTO dipping_lot_batch_l (DippingLot_L) value (:send)";
            $statement = $connect->prepare($query);
            $statement->bindValue(":send", $res);
            $statement->execute();
        }
        else
        {
            $query = "INSERT INTO dipping_lot_batch_r (DippingLot_R) value (:send)";
            $statement = $connect->prepare($query);
            $statement->bindValue(":send", $res);
            $statement->execute();  
        }
       
    }
    foreach ($received_data->send as $res)
    {   
        if($res%2==1)
        {                  
            $query = "INSERT INTO dipping_lot_hand_l (DippingLot_L) value (:send)";
            $statement = $connect->prepare($query);
            $statement->bindValue(":send", $res);
            $statement->execute();
        }
        else
        {
            $query = "INSERT INTO dipping_lot_hand_r (DippingLot_R) value (:send)";
            $statement = $connect->prepare($query);
            $statement->bindValue(":send", $res);
            $statement->execute();
        }
       $output = array(
         'message' => 'Data Inserted Complete!'
         );
        echo json_encode($output);

    }

}
if($received_data->actions == "dataas2")
{
      
    foreach ($received_data->sendas2 as $res) 
    {    
        if($res%2==0)
        {       
            $query = "INSERT INTO dipping_lot_batch_r (DippingLot_R) value (:sendas2)";
            $statement = $connect->prepare($query);
            $statement->bindValue(":sendas2", $res);
            $statement->execute();

        }

        else
        {
            $query = "INSERT INTO dipping_lot_batch_l (DippingLot_L) value (:sendas2)";
            $statement = $connect->prepare($query);
            $statement->bindValue(":sendas2", $res);
            $statement->execute();
        }
        $output = array(
            'message' => 'Data Inserted Complete!'
            );
            echo json_encode($output);

    }
             
    foreach ($received_data->sendas2 as $res)
    { 
        if($res%2==0)
        {       
            $query = "INSERT INTO dipping_lot_hand_r (DippingLot_R) value (:sendas2)";
            $statement = $connect->prepare($query);
            $statement->bindValue(":sendas2", $res);
            $statement->execute();
        }
        else
        {
            $query = "INSERT INTO dipping_lot_hand_l (DippingLot_L) value (:sendas2)";
            $statement = $connect->prepare($query);
            $statement->bindValue(":sendas2", $res);
            $statement->execute();
        }  
        
          $output = array(
            'message' => 'Data Inserted Complete!'
            );
            echo json_encode($output);
    }
          
}
if($received_data->actions == 'delete'){
    $query = "SELECT * FROM dipping_lot_batch_l WHERE DippingLot_L = '".$received_data->id."'";
    $statement = $connect->prepare($query);
    $statement->execute();

    $output = array(
        'message' => 'Success!!'
    );
    echo json_encode($output);
}

if($received_data->actions == 'deleteR'){
    $query = "SELECT * FROM dipping_lot_batch_r WHERE DippingLot_R = '".$received_data->id."'";
    $statement = $connect->prepare($query);
    $statement->execute();

    $output = array(
        'message' => 'Success!!'
    );
    echo json_encode($output);
}

if($received_data->actions == "ArrtoJson")
{
    $output = array(
        'arr' => json_encode($received_data->arr)
    );
    echo json_encode($output);
}
if($received_data->actions == "ArrtoJsonR")
{
    $output = array(
        'arr' => json_encode($received_data->arr)
    );
    echo json_encode($output);
}
?>