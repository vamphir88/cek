<?php
require_once('./line_class.php');
require_once('./unirest-php-master/src/Unirest.php');
$channelAccessToken = 'YOUR_CHANNEL_ACCESS _TOKEN'; //sesuaikan 
$channelSecret = 'YOUR_CHANNEL_SECRET';//sesuaikan
$client = new LINEBotTiny($channelAccessToken, $channelSecret);
$userId     = $client->parseEvents()[0]['source']['userId'];
$groupId    = $client->parseEvents()[0]['source']['groupId'];
$replyToken = $client->parseEvents()[0]['replyToken'];
$timestamp  = $client->parseEvents()[0]['timestamp'];
$type       = $client->parseEvents()[0]['type'];
$message    = $client->parseEvents()[0]['message'];
$messageid  = $client->parseEvents()[0]['message']['id'];
$profil = $client->profil($userId);
$pesan_datang = explode(" ", $message['text']);
$msg_type = $message['type'];
$command = $pesan_datang[0];
$options = $pesan_datang[1];
if (count($pesan_datang) > 2) {
    for ($i = 2; $i < count($pesan_datang); $i++) {
        $options .= '+';
        $options .= $pesan_datang[$i];
    }
}
#-------------------------[Function Open]-------------------------#
#-------------------------[Open]-------------------------#
function quotes($keyword) {
    $uri = "https://rest.farzain.com/api/motivation.php?apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = "「Quotes」";
    $result .= "Status : Success!!!";
    $result .= "\nQuotes : ";
    $result .= $json['result']['quotes'];
    $result .= "\nBy : ";
    $result .= $json['result']['by'];
	$result .= "\n「Done~」";
    return $result;
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function wib($keyword) {
    $uri = "https://time.siswadi.com/timezone/?address=Jakarta";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $parsed = array(); 
    $parsed['time'] = $json['time']['time'];
    $parsed['date'] = $json['time']['date'];
    return $parsed;
}
function wit($keyword) {
    $uri = "https://time.siswadi.com/timezone/?address=jayapura";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $parsed = array(); 
    $parsed['time'] = $json['time']['time'];
    $parsed['date'] = $json['time']['date'];
    return $parsed;
}
function wita($keyword) {
    $uri = "https://time.siswadi.com/timezone/?address=manado";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $parsed = array(); 
    $parsed['time'] = $json['time']['time'];
    $parsed['date'] = $json['time']['date'];
    return $parsed;
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function tts($keyword) { 
    $uri = "https://translate.google.com/translate_tts?ie=UTF-8&tl=id-ID&client=tw-ob&q=" . $keyword; 

    $response = Unirest\Request::get("$uri"); 
    $result = $uri; 
    return $result; 
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function urb_dict($keyword) {
    $uri = "http://api.urbandictionary.com/v0/define?term=" . $keyword;
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = $json['list'][0]['definition'];
    $result .= "\n\nExamples : \n";
    $result .= $json['list'][0]['example'];
    return $result;
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function zodiak($keyword) {
    $uri = "https://script.google.com/macros/exec?service=AKfycbw7gKzP-WYV2F5mc9RaR7yE3Ve1yN91Tjs91hp_jHSE02dSv9w&nama=ervan&tanggal=" . $keyword;

    $response = Unirest\Request::get("$uri");

    $json = json_decode($response->raw_body, true);
    $result = "「Zodiak Kamu」";
    $result .= "\nLahir : ";
	$result .= $json['data']['lahir'];
	$result .= "\nUsia : ";
	$result .= $json['data']['usia'];
	$result .= "\nUltah : ";
	$result .= $json['data']['ultah'];
	$result .= "\nZodiak : ";
	$result .= $json['data']['zodiak'];
	$result .= "\n\nPencarian : Google";
	$result .= "\n「Done~」";
    return $result;
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function film_syn($keyword) {
    $uri = "http://www.omdbapi.com/?t=" . $keyword . '&plot=full&apikey=d5010ffe';

    $response = Unirest\Request::get("$uri");

    $json = json_decode($response->raw_body, true);
    $result = "Judul : \n";
	$result .= $json['Title'];
	$result .= "\n\nSinopsis : \n";
	$result .= $json['Plot'];
    return $result;
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function film($keyword) {
    $uri = "http://www.omdbapi.com/?t=" . $keyword . '&plot=full&apikey=d5010ffe';

    $response = Unirest\Request::get("$uri");

    $json = json_decode($response->raw_body, true);
    $result = "「Informasi Film」";
    $result .= "\nJudul :";
	$result .= $json['Title'];
	$result .= "\nRilis : ";
	$result .= $json['Released'];
	$result .= "\nTipe : ";
	$result .= $json['Genre'];
	$result .= "\nActors : ";
	$result .= $json['Actors'];
	$result .= "\nBahasa : ";
	$result .= $json['Language'];
	$result .= "\nNegara : ";
	$result .= $json['Country'];
	$result .= "\n「Done~」";
    return $result;
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
function shalat($keyword) {
    $uri = "https://time.siswadi.com/pray/" . $keyword;

    $response = Unirest\Request::get("$uri");

    $json = json_decode($response->raw_body, true);
    $result = "「Jadwal shalat」";
    $result .= "\nLokasi : ";
	$result .= $json['location']['address'];
	$result .= "\nTanggal : ";
	$result .= $json['time']['date'];
	$result .= "\n\nShubuh : ";
	$result .= $json['data']['Fajr'];
	$result .= "\nDzuhur : ";
	$result .= $json['data']['Dhuhr'];
	$result .= "\nAshar : ";
	$result .= $json['data']['Asr'];
	$result .= "\nMaghrib : ";
	$result .= $json['data']['Maghrib'];
	$result .= "\nIsya : ";
	$result .= $json['data']['Isha'];
	$result .= "\n\nPencarian : Google";
	$result .= "\n「Done~」";
    return $result;
}
#-------------------------[Close]-------------------------#
function instagram($keyword) {
    $uri = "https://rest.farzain.com/api/ig_profile.php?id=" . $keyword . "&apikey=fDh6y7ZwXJ24eiArhGEJ55HgA";
  
    $response = Unirest\Request::get("$uri");
  
    $json = json_decode($response->raw_body, true);
    $parsed = array();
    $parsed['a1'] = $json['info']['username'];
    $parsed['a2'] = $json['info']['bio'];
    $parsed['a3'] = $json['count']['followers'];
    $parsed['a4'] = $json['count']['following'];
    $parsed['a5'] = $json['count']['post'];
    $parsed['a6'] = $json['info']['full_name'];
    $parsed['a7'] = $json['info']['profile_pict'];
    $parsed['a8'] = "https://www.instagram.com/" . $keyword;
    return $parsed;
}
#-------------------------[Open]-------------------------#
function qibla($keyword) { 
    $uri = "https://time.siswadi.com/qibla/" . $keyword; 
 
    $response = Unirest\Request::get("$uri"); 
 
    $json = json_decode($response->raw_body, true); 
 $result .= $json['data']['image'];
    return $result; 
}
//show menu, saat join dan command,menu
if ($command == 'Help') {
    $text .= "「Keyword RpdBot~」\n\n";
    $text .= "- Help\n";
    $text .= "- /jam \n";
    $text .= "- /quotes \n";
    $text .= "- /say [teks] \n";
    $text .= "- /definition [teks] \n";
    $text .= "- /coolteks [teks] \n";
    $text .= "- /shalat [lokasi] \n";
    $text .= "- /qiblat [teks] \n";
    $text .= "- /film [teks] \n";
    $text .= "- /film-syn [teks] \n";
    $text .= "- /zodiak [tanggal lahir] \n";
		$text .= "- /instagram [unsername] \n";
    $text .= "- /creator \n";
	$text .= "\n「Done~」";
    $balas = array(
        'replyToken' => $replyToken,
        'messages' => array(
            array(
                'type' => 'text',
                'text' => $text
            )
        )
    );
}
if ($type == 'join') {
    $text = "Terimakasih Telah invite aku ke group ini silahkan ketik Help untuk lihat command aku :)";
    $balas = array(
        'replyToken' => $replyToken,
        'messages' => array(
            array(
                'type' => 'text',
                'text' => $text
            )
        )
    );
}
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/quotes') {
        $result = quotes($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text'  => $result
                )
            )
        );
    }
}   
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
if ($command == '/jam') { 
     
        $result = wib($options); 
        $result2 = wit($options); 
        $result3 = wita($options); 
        $balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array ( 
                  'type' => 'template', 
                  'altText' => 'Jam Indonesia', 
                  'template' =>  
                  array ( 
                    'type' => 'carousel', 
                    'columns' =>  
                    array ( 
                      0 =>  
                      array ( 
                        'thumbnailImageUrl' => 'https://preview.ibb.co/gXGfLU/20180913_194713.jpg', 
                        'imageBackgroundColor' => '#FFFFFF', 
                        'title' => 'WIB', 
                        'text' => 'Jam Indonesia WIB', 
                        'actions' =>  
                        array ( 
                          0 =>  
                          array ( 
                            'type' => 'postback', 
                            'label' => $result['time'], 
                            'data' => $result['time'], 
                          ), 
                          1 =>  
                          array ( 
                            'type' => 'postback', 
                            'label' => $result['date'],
                            'data' => $result['date'],
                          ), 
                        ), 
                      ), 
                      1 =>  
                      array ( 
                        'thumbnailImageUrl' => 'https://preview.ibb.co/nxaPfU/20180913_194725.jpg', 
                        'imageBackgroundColor' => '#000000', 
                        'title' => 'WIT', 
                        'text' => 'Jam Indonesia WIT', 
                        'actions' =>  
                        array ( 
                          0 =>  
                          array ( 
                            'type' => 'postback', 
                            'label' => $result2['time'], 
                            'data' => $result2['time'], 
                          ), 
                          1 =>  
                          array ( 
                            'type' => 'postback', 
                            'label' => $result2['date'],
                            'data' => $result2['date'],
                          ), 
                        ), 
                      ), 
                      2 =>  
                      array ( 
                        'thumbnailImageUrl' => 'https://preview.ibb.co/cPdc0U/20180913_194744.jpg', 
                        'imageBackgroundColor' => '#000000', 
                        'title' => 'WITA', 
                        'text' => 'Jam Indonesia WITA', 
                        'actions' =>  
                        array ( 
                          0 =>  
                          array ( 
                            'type' => 'postback', 
                            'label' => $result3['time'], 
                            'data' => $result3['time'], 
                          ), 
                          1 =>  
                          array ( 
                            'type' => 'postback', 
                            'label' => $result3['date'],
                            'data' => $result3['date'],
                          ), 
                        ),  
                      ),
                    ), 
                  ), 
                ) 
            ) 
        ); 
}
}
#-------------------------[Close]-------------------------#
if($message['type']=='text') {
    if ($command == '/test') { 
        
        $result = quotes($options);
        $balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array ( 
                        'type' => 'template', 
                          'altText' => 'Quotes', 
                          'template' =>  
                          array ( 
                            'type' => 'buttons', 
                            'thumbnailImageUrl' => 'Error', 
                            'imageAspectRatio' => 'rectangle', 
                            'imageSize' => 'cover', 
                            'imageBackgroundColor' => '#FFFFFF', 
                            'title' => 'Halo', 
                            'text' => $result, 
                            'actions' =>  
                            array ( 
                              0 =>  
                              array ( 
                                'type' => 'text', 
                                'label' => 'Done', 
                                'text' => 'Terimakasih Bot',
                              ), 
                            ), 
                          ), 
                        ) 
            ) 
        ); 
    }
}
if($message['type']=='text') {
    if ($command == '/instagram') { 
        
        $result = instagram($options);
        $altText2 = "Followers : " . $result['a3'];
        $altText2 .= "\nFollowing :" . $result['a4'];
        $altText2 .= "\nPost :" . $result['a5'];
        $balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array ( 
                        'type' => 'template', 
                          'altText' => 'Instagram' . $options, 
                          'template' =>  
                          array ( 
                            'type' => 'buttons', 
                            'thumbnailImageUrl' => $result['a7'], 
                            'imageAspectRatio' => 'rectangle', 
                            'imageSize' => 'cover', 
                            'imageBackgroundColor' => '#FFFFFF', 
                            'title' => $result['a6'], 
                            'text' => $altText2, 
                            'actions' =>  
                            array ( 
                              0 =>  
                              array ( 
                                'type' => 'uri', 
                                'label' => 'Check', 
                                'uri' => $result['a8'],
                              ), 
                            ), 
                          ), 
                        ) 
            ) 
        ); 
    }
}
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
    if ($command == '/say') {

        $result = tts($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
                'type' => 'audio',
                'originalContentUrl' => $result,
                'duration' => 10000,
                )
            )
        );
}
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if ($message['type'] == 'text') {
    if ($command == '/definition') {
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'Definition : ' . urb_dict($options)
                )
            )
        );
    }
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/coolt') { 
     
        $result = coolt($options);
        $balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array ( 
                        'type' => 'template', 
                          'altText' => 'Cool Text', 
                          'template' =>  
                          array ( 
                            'type' => 'buttons', 
                            'thumbnailImageUrl' => $result, 
                            'imageAspectRatio' => 'rectangle', 
                            'imageSize' => 'cover', 
                            'imageBackgroundColor' => '#FFFFFF', 
                            'title' => 'Cool Text Generator V1.0', 
                            'text' => 'Link Image', 
                            'actions' =>  
                            array ( 
                              0 =>  
                              array ( 
                                'type' => 'uri', 
                                'label' => 'Click Here', 
                                'uri' => $result, 
                              ), 
                            ), 
                          ), 
                        ) 
            ) 
        ); 
    }
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/zodiak') {

        $result = zodiak($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/creator') { 
     
        $balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array ( 
                        'type' => 'template', 
                          'altText' => 'About Creator BedBotdzs', 
                          'template' =>  
                          array ( 
                            'type' => 'buttons', 
                            'thumbnailImageUrl' => 'https://bpptik.kominfo.go.id/wp-content/uploads/2016/09/Programmer.jpg', 
                            'imageAspectRatio' => 'rectangle', 
                            'imageSize' => 'cover', 
                            'imageBackgroundColor' => '#FFFFFF', 
                            'title' => 'Muhammad Raihan Permadi', 
                            'text' => 'Creator BedBotdzs', 
                            'actions' =>  
                            array ( 
                              0 =>  
                              array ( 
                                'type' => 'uri', 
                                'label' => 'Contact', 
                                'uri' => 'https://line.me/ti/p/~rhnprmd', 
                              ), 
                            ), 
                          ), 
                        ) 
            ) 
        ); 
    }
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/film-syn') {
        $result = film_syn($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array( 
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/film') {

        $result = film($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/shalat') {

        $result = shalat($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
#-------------------------[Close]-------------------------#
#-------------------------[Open]-------------------------#
if($message['type']=='text') {
        if ($command == '/qiblat') { 
     
        $result = qibla($options);
        $balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array ( 
                        'type' => 'template', 
                          'altText' => 'Qiblat shalat', 
                          'template' =>  
                          array ( 
                            'type' => 'buttons', 
                            'thumbnailImageUrl' => $result, 
                            'imageAspectRatio' => 'rectangle', 
                            'imageSize' => 'cover', 
                            'imageBackgroundColor' => '#FFFFFF', 
                            'title' => 'Qiblat Shalat', 
                            'text' => 'Cek Full Image', 
                            'actions' =>  
                            array ( 
                              0 =>  
                              array ( 
                                'type' => 'uri', 
                                'label' => 'Click Here', 
                                'uri' => $result, 
                              ), 
                            ), 
                          ), 
                        ) 
            ) 
        ); 
    }
}
if (isset($balas)) {
    $result = json_encode($balas);
//$result = ob_get_clean();
    file_put_contents('./balasan.json', $result);
    $client->replyMessage($balas);
}
?>
