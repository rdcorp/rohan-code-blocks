/* 
This js snippet will load the Hubspot chatbox after 15 seconds.
*/
<script>
window.hsConversationsSettings = { loadImmediately: false };
setTimeout(function() {
window.HubSpotConversations.widget.load();
}, 15000);
</script>
