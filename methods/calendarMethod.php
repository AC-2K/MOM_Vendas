<?php
session_start();
include 'DB.php';
include 'sessions.php';
$events = [];
$q = $_GET['q'];

if ($q === 'Prospect') {
    $sql="SELECT * from prospect
    inner join client_company On prospect.id_client = client_company.id_client
    inner join company_details On company_details.company_id  = client_company.id_company
    WHERE client_company.id_company = '$empresaActual' ";


    $result = mysqli_query($conn, $sql);
    
    if ($result && $result->num_rows > 0) {
        $data = $result->fetch_all(MYSQLI_ASSOC);

        foreach ($data as $item) {
            $events[] = [
                'title' => $item['prospect_details'],
                'start' => date('Y-m-d', strtotime($item['prospect_start_date'])),
                'end' => date('Y-m-d', strtotime($item['prospect_start_date']))    
            ];
        }
    } else {
        // If no results found, send an empty response
        $events[] = [
            'title' => " ",
            'start' => " ",
            'end' =>" "
        ];
    }

    mysqli_close($conn);

    // Send the response as JSON
    header('Content-Type: application/json');
    echo json_encode($events);

}elseif ($q === 'Meeting') {
    $sql="SELECT * from prospect_meeting
    inner join prospect On prospect.prospect_id = prospect_meeting.id_prospect
    inner join client_company On prospect.id_client = client_company.id_client
    inner join company_details On company_details.company_id  = client_company.id_company
    WHERE client_company.id_company = '$empresaActual' ";
    
    $result = mysqli_query($conn, $sql);
    if ($result && $result->num_rows > 0) {
        $data = $result->fetch_all(MYSQLI_ASSOC);

        foreach ($data as $item) {
            $events[] = [
                'title' => $item['meeting_description'],
                'start' => date('Y-m-d', strtotime($item['meeting_date'])),
                'end' => date('Y-m-d', strtotime($item['meeting_date']))    
            ];
        }
    } else {
        // If no results found, send an empty response
        $events[] = [
            'title' => " ",
            'start' => " ",
            'end' =>" "
        ];
    }
    mysqli_close($conn);

    // Send the response as JSON
    header('Content-Type: application/json');
    echo json_encode($events);

}elseif ($q === 'Oportunidade') {
    $sql="SELECT * from company_oportunity
    inner join company_user On company_user.user_id = company_oportunity.id_user
    WHERE company_user.id_company = '$empresaActual' ";

    $result = mysqli_query($conn, $sql);
    if ($result && $result->num_rows > 0) {
        $data = $result->fetch_all(MYSQLI_ASSOC);

        foreach ($data as $item) {
            $events[] = [
                'title' => $item['oportunity_description'],
                'start' => date('Y-m-d', strtotime($item['oportunity_date_inserted'])),
                'end' => date('Y-m-d', strtotime($item['oportunity_date_limit']))    
            ];
        }
        
    } else {
       // If no results found, send an empty response
       $events[] = [
            'title' => " ",
            'start' => " ",
            'end' =>" "
        ];
    }
    mysqli_close($conn);

    // Send the response as JSON
    header('Content-Type: application/json');
    echo json_encode($events);
}elseif ($q === 'Actividade') {
    $sql="SELECT * from company_technical_activity
    inner join company_details On company_technical_activity.id_company = company_details.company_id
    WHERE company_details.company_id = '$empresaActual' ";

    $result = mysqli_query($conn, $sql);
    if ($result && $result->num_rows > 0) {
        $data = $result->fetch_all(MYSQLI_ASSOC);

        foreach ($data as $item) {
            $events[] = [
                'title' => $item['tecAc_description'],
                'start' => date('Y-m-d', strtotime($item['tecAc_start_date'])),
                'end' => date('Y-m-d', strtotime($item['tecAc_end_date']))    
            ];
        }
        
    } else {
       // If no results found, send an empty response
       $events[] = [
            'title' => " ",
            'start' => " ",
            'end' =>" "
        ];
    }
    mysqli_close($conn);

    // Send the response as JSON
    header('Content-Type: application/json');
    echo json_encode($events);
}elseif ($q === 'Manutencao') {
    $sql="SELECT * from company_technical_maintanance_list 
    inner join company_technical_maintanance_client On company_technical_maintanance_list.id_main = company_technical_maintanance_client.main_id
    inner join company_details On company_technical_maintanance_client.id_company = company_details.company_id
    WHERE company_details.company_id = '$empresaActual' ";

    $result = mysqli_query($conn, $sql);
    if ($result && $result->num_rows > 0) {
        $data = $result->fetch_all(MYSQLI_ASSOC);

        foreach ($data as $item) {
            $events[] = [
                'title' => $item['mainList_description'],
                'start' => date('Y-m-d', strtotime($item['mainList_date'])),
                'end' => date('Y-m-d', strtotime($item['mainList_date']))    
            ];
        }
        
    } else {
        $events[] = [
            'title' => $item['mainList_description'],
            'start' => date('Y-m-d', strtotime($item['mainList_date'])),
            'end' => date('Y-m-d', strtotime($item['mainList_date']))    
        ];
    }

    mysqli_close($conn);

    // Send the response as JSON
    header('Content-Type: application/json');
    echo json_encode($events);
}else{
    $events[] = [
        'title' => $item['MR, estas a brincar mal'],
        'start' => date('Y-m-d'),
        'end' => date('Y-m-d')    
    ];
    echo json_encode($events);
}
