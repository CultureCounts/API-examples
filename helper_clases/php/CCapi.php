<?php

$GLOBALS['config'] = include_once('config.php');


class CCRequest {

    public function __construct($apikey=null){
        $this->csrftoken = "";
        $this->authtoken = "";

        if (!$apikey){
        	$apikey = $GLOBALS['config']['APIKEY'];
        }
        $this->apikey = $apikey;
        $this->host = $GLOBALS['config']['HOST'];
        $this->auth_models = $GLOBALS['config']['AUTH_MODELS'];
    }

    public function callAPI($method, $url, $data = false){
        $curl = curl_init();

        switch ($method){
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            default:
                $url = $url;
        }

        // OPTIONS:
        //
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'X-CSRFToken:'.$this->csrftoken,
            'authtoken:'.$this->authtoken,
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

        // EXECUTE:
        $result = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if(!$result){die("Connection Failure");}
        curl_close($curl);

        return array("data" => json_decode($result, true), "status" => $httpcode);
    }

    public function ccURL($model, $id=false, $queryset=false){

        $url = "";

    	if (in_array($model, $this->auth_models)){
    		$url = "/auth/".$model."/";
    	} else {
            if ($id) {
                $url = "/".$model."/".$id."/";
            } else {
                $url = "/".$model."/";
            }
        }
        if($queryset){
            $url = $url."?".http_build_query($queryset, '', '&');
        }

        return $this->host.$url;
    }

    public function get($model, $id = false, $queryset = false){
        $url = $this->ccURL($model, $id, $queryset);
        $get_data = $this->callAPI('GET', $url);
        return json_encode($get_data, true);
    }

    public function post($model, $payload){
        $url = $this->ccURL($model);
        $post_data = $this->callAPI('POST', $url, $payload);
        return json_encode($post_data, true);
    }

    public function put($model, $id, $payload){
        $url = $this->ccURL($model, $id);
        $put_data = $this->callAPI('PUT', $url, $payload);
        return json_encode($put_data, true);
    }

    public function delete($model, $id){
        $url = $this->ccURL($model, $id);
        $delete_data = $this->callAPI('DELETE', $url);
        return $json_encod(edelete_data, true);
    }

    public function login(){
        $payload = array(
            "apikey" => $this->apikey
        );

        $response1 = $this->post("login", $payload);
        $response = json_decode($response1, true);
        if ($response['status'] == 200){
            $data = $response["data"];
            $this->authtoken = $data["token-id"];
            $this->csrftoken = $data["csrftoken"];
        }
        return $response1;
    }

}
