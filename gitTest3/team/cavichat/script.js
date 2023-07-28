const Peer = window.Peer;

(async function main() {
  const localVideo = document.getElementById('js-local-stream');
  const localId = document.getElementById('js-local-id');
  const localText = document.getElementById('js-local-text');
  const connectTrigger = document.getElementById('js-connect-trigger');
  const videomute = document.getElementById('cameraimg');
  const micmute = document.getElementById('micimg');
  const closeTrigger = document.getElementById('js-close-trigger');
  const sendTrigger = document.getElementById('js-send-trigger');
  const remoteVideo = document.getElementById('js-remote-stream');
  const remoteId = document.getElementById('js-remote-id');
  const messages = document.getElementById('js-messages');
  const meta = document.getElementById('js-meta');
  const sdkSrc = document.querySelector('script[src*=skyway]');
  // const videomute = document.getElementById('cameraimg');
  // const videomute2 = document.getElementById('cameraimg2');

  
  console.log(param);
  const id = param;
  // const name = param2;

  meta.innerText = `
    UA: ${navigator.userAgent}
    SDK: ${sdkSrc ? sdkSrc.src : 'unknown'}
  `.trim();

  const peer = (window.peer = new Peer(
    id,
    {
    key: window.__SKYWAY_KEY__,
    debug: 3,
  }));

  //追加
  const localStream = await navigator.mediaDevices
    .getUserMedia({
      audio: true,
      video: true,
    })
    .catch(console.error);

    var videoTrack = localStream.getVideoTracks()[0];
      videoTrack.enabled = false;

    var audioTrack = localStream.getAudioTracks()[0];
      audioTrack.enabled = false;

    // Render local stream8
    localVideo.muted = true;
    localVideo.srcObject = localStream;
    localVideo.playsInline = true;
    await localVideo.play().catch(console.error);

    // ビデオのミュート
    var i = 0;
    videomute.addEventListener('click', () => {
      if(i == 0){
        var videoTrack = localStream.getVideoTracks()[0];
        videoTrack.enabled = true;
        document.getElementById('cameraimg').src = 'camera.jpg';
        i = 1;
      }else if(i == 1){
        var videoTrack = localStream.getVideoTracks()[0];
        videoTrack.enabled = false;
        document.getElementById('cameraimg').src = 'camera_off.jpg';
        i = 0;
      }
    });

    // マイクのミュート
    var j = 0;
    micmute.addEventListener('click', () => {
      if(j == 0){
        var audioTrack = localStream.getAudioTracks()[0];
        audioTrack.enabled = true;
        document.getElementById('micimg').src = 'mic.jpg';
        j = 1;
      }else if(j == 1){
        var audioTrack = localStream.getAudioTracks()[0];
        audioTrack.enabled = false;
        document.getElementById('micimg').src = 'mic_off.jpg';
        j = 0;
      }
    });

  // Register connecter handler


  connectTrigger.addEventListener('click', () => {
    // Note that you need to ensure the peer has connected to signaling server
    // before using methods of peer instance.
    if (!peer.open) {
      return;
    }

    const dataConnection = peer.connect(remoteId.value);

    // 追加
    const mediaConnection = peer.call(remoteId.value, localStream);

    mediaConnection.on('stream', async stream => {
      // Render remote stream for caller
      remoteVideo.srcObject = stream;
      remoteVideo.playsInline = true;
      await remoteVideo.play().catch(console.error);
    });

    mediaConnection.once('close', () => {
      remoteVideo.srcObject.getTracks().forEach(track => track.stop());
      remoteVideo.srcObject = null;
    });

    closeTrigger.addEventListener('click', () => mediaConnection.close(true));

    dataConnection.once('open', async () => {
      messages.textContent += `　　　　接続開始\n`;

      //追加
      $(function() {
        //$(".A").click(function() {
            $(".A").toggleClass("C");
        //});
      });

      sendTrigger.addEventListener('click', onClickSend);
    });

    dataConnection.on('data', data => {
      messages.textContent += `カウンセラー:\n`;
      messages.textContent += `${data}\n`;
    });

    dataConnection.once('close', () => {
      messages.textContent += `カウンセリングが終了しました\n`;
      sendTrigger.removeEventListener('click', onClickSend);
    });

    // Register closing handler
    closeTrigger.addEventListener('click', () => dataConnection.close(true), {
      once: true,
    });

    function onClickSend() {
      const data = localText.value;
      dataConnection.send(data);

      messages.textContent += `${name}: \n`;
      messages.textContent += `${data}\n`;
      localText.value = '';
    }
  });


  // peer.once('open', id => (localId.textContent = id));
  console.log(id);
  localId.textContent = id
  // console.log(stream.getVideoTracks()[0].enabled);
  // console.log(dataConnection);

  // localId.textContent = "1234";
  // Register connected peer handler
  peer.on('connection', dataConnection => {
    dataConnection.once('open', async () => {
      messages.textContent += `　　　　接続開始\n`;

      sendTrigger.addEventListener('click', onClickSend);
    });

    dataConnection.on('data', data => {
      messages.textContent += `カウンセラー:\n`;
      messages.textContent += `${data}\n`;
    });

    dataConnection.once('close', () => {
      messages.textContent += `カウンセリングが終了しました\n`;
      sendTrigger.removeEventListener('click', onClickSend);
    });

    // Register closing handler
    closeTrigger.addEventListener('click', () => dataConnection.close(true), {
      once: true,
    });

    function onClickSend() {
      const data = localText.value;
      dataConnection.send(data);

      messages.textContent += `${name}: \n`;
      messages.textContent += `${data}\n`;
      localText.value = '';
    }
  });

  // 追加
  peer.on('call', mediaConnection => {
    mediaConnection.answer(localStream);

    mediaConnection.on('stream', async stream => {
      // Render remote stream for callee
      remoteVideo.srcObject = stream;
      remoteVideo.playsInline = true;
      await remoteVideo.play().catch(console.error);
    });

    mediaConnection.once('close', () => {
      remoteVideo.srcObject.getTracks().forEach(track => track.stop());
      remoteVideo.srcObject = null;
    });

    closeTrigger.addEventListener('click', () => mediaConnection.close(true));
  });

  peer.on('error', console.error);
})();