<?php declare(strict_types=1);

class ChatgptController extends GuardController {
    function index(): void {
      $messages = [];
      $messages[] = ['role' => 'user', 'content' => 'Player made the decision to go left'];
      $response = $this->chatGPTRequest($messages);
      $this->json(200, $response);
    }

  private function chatGPTRequest($messages) {
    $headers = [
        'Content-Type: application/json',
        'Authorization: Bearer ' . Configs::get('openaisecret')
    ];

    $data = [
      'model' => 'gpt-3.5-turbo',
      'messages' => $messages,
      "max_tokens"=> 400, // Adjust as needed
      "temperature"=> 0.7 // Adjust as needed
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/chat/completions');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);

    if ($response === false) {
        echo 'Error: ' . curl_error($ch);
    }

    curl_close($ch);
    $decodedResponse = json_decode($response, true);

    return $decodedResponse;
  }
}
