<script>
    const beamsClient = new PusherPushNotifications.Client({
    instanceId: '3a7c226c-b409-40f9-add8-ace345844730',
  });

 // const beamsTokenProvider = new PusherPushNotifications.TokenProvider({
//url: '{{ route('beams-auth') }}',
//}),

  beamsClient.start()
   .then(() => beamsClient.addDeviceInterest('App.Models.User.{{ auth()->id() }}'))
    .then(() => console.log('Successfully registered and subscribed!'))
    .catch(console.error);






</script>