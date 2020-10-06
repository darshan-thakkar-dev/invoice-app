// replace these values with those generated in your TokBox Account
var apiKey = '45828062';
var sessionId = '2_MX40NTgyODA2Mn5-MTYwMDg3NzM0NTkxOX5zZ2FaNFJvN2ppd0VTNXBGVFhQQ3FMWFd-UH4';
var token = 'T1==cGFydG5lcl9pZD00NTgyODA2MiZzaWc9YTM3ZjFkOGE5NTU3MjZiZmJkYTM1MzI5NTQ2YTU4YjQ4ZjliZmM5NjpzZXNzaW9uX2lkPTJfTVg0ME5UZ3lPREEyTW41LU1UWXdNRGczTnpNME5Ua3hPWDV6WjJGYU5GSnZOMnBwZDBWVE5YQkdWRmhRUTNGTVdGZC1VSDQmY3JlYXRlX3RpbWU9MTYwMDg3ODI4MyZub25jZT0wLjAzOTAxNzYzNzY1MTkyNzM0JnJvbGU9cHVibGlzaGVyJmV4cGlyZV90aW1lPTE2MDA5NjQ2ODM=';
// (optional) add server code here
initializeSession();


// Handling all of our errors here by alerting them
function handleError(error) {
  if (error) {
    alert(error.message);
  }
}

function initializeSession() {
  var session = OT.initSession(apiKey, sessionId);

  // Subscribe to a newly created stream

  // Create a publisher
  var publisher = OT.initPublisher('publisher', {
    insertMode: 'append',
    width: '100%',
    height: '100%'
  }, handleError);

  // Connect to the session
  session.connect(token, function(error) {
    // If the connection is successful, publish to the session
    if (error) {
      handleError(error);
    } else {
      session.publish(publisher, handleError);
    }
  });
}

var SERVER_BASE_URL = 'http://invoice-app-call.herokuapp.com/';
    fetch(SERVER_BASE_URL + '/session').then(function(res) {
      return res.json()
    }).then(function(res) {
      apiKey = res.apiKey;
      sessionId = res.sessionId;
      token = res.token;
      initializeSession();
    }).catch(handleError);
