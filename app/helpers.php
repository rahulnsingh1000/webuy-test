<?php
  
function responseMessage($caseType,$data=false){

    switch ($caseType) {

    	case "Cibil":
            $response= array(
            	'code'=> 'ELS01', 
            	'message'=> "Bureau score less than approval Score"
            );

        break;

        case "Age":
            $response= array(
            	'code'=> 'ELS02', 
            	'message'=> "Entered age is invalid. Age must be between ".$data[0]." and ".$data[1]
            );

        break;

        case "Loan Amount":
            $response= array(
            	'code'=> 'ELS03', 
            	'message'=> "Entered loan amount is invalid. Loan Amount must be between ".$data[0]." and ".$data[1]
            );

        break;

        case "Tradline":
            $response= array(
                'code'=> 'ELS04', 
                // 'message'=> "Reject due to file settlement. found ".implode(",",array_unique($data['0']))." in Bureau"
                'message'=> "Reject due to file settlement."
            );

        break;

        case "Pincode":
            $response= array(
                'code'=> 'ELS05', 
                'message'=> "Reject due to invalid pincode "
            );

        break;

        case "Loan Tenure":
            $response= array(
                'code'=> 'ELS06', 
                'message'=> "Entered loan tenure is invalid"
            );

        break;

        case "Invalid data":
            $response= array(
            	'code'=> 'ELS07', 
            	'message'=> "Invalid data. value of ".$data[0]." is not valid"
            );

        break;

        case "DPD in credit card":
            $response= array(
                'code'=> 'ELS09', 
                'message'=> "Reject due to DPD found. DPD in credit card statement is ".$data."+"
            );

        break;

        case "DPD in 3 months":
            $response= array(
                'code'=> 'ELS09', 
                'message'=> "Reject due to DPD found. DPD in last 3 month is ".$data."+"
            );

        break;

        case "DPD in 12 months":
            $response= array(
                'code'=> 'ELS10', 
                'message'=> "Reject due to DPD found. DPD in last 12 month is ".$data."+"
            );

        break;

        case "Overdue":
            $response= array(
                'code'=> 'ELS11', 
                'message'=> "Reject due to overdue amount. Overdue amount is ".$data
            );
        break;

        case "Course Fee Percentage":
            $response= array(
                'code'=> 'ELS12', 
                'message'=> "Reject due to course fee. 90% of course fee amount should be between ".$data[0]." and ".$data[1]
            );
        break;

        case "Product Type":
            $response= array(
                'code'=> 'ELS13', 
                'message'=> "Reject due to invalid product type"
            );
        break;

        case "Salary":
            $response= array(
                'code'=> 'ELS14', 
                'message'=> "Reject due to Salary"
            );
        break;

        case "Foir":
            $response= array(
                'code'=> 'ELS15', 
                'message'=> "Reject due to Foir"
            );
        break;
       
        default:
            $response= "Incorrect data";
    }
    return $response; 
}
