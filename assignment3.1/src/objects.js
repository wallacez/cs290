/**
* Create an object literal with the following key value pairs:
* type: {string} 'Goldfish'
* brand: {string} 'Pepperidge Farm'
* flavor: {string} 'Cheddar'
* count: {number} 2000
* It should be returned directly by the following function
* @return {object} - the object literal
*/

function returnObjectLiteral() {
  //your code here
  return { type: 'Goldfish',
           brand: 'Pepperidge Farm',
           flavor: 'Cheddar',
           count: 2000
  }; //Modify ONLY this line
  //end your code
}

/**
* Create a constructor function for a `MessageLog` object.
* @constructor
* @param {string} user - The user associated to the message log
* The string indicating the user should be stored in the user property of the
* object instances.
*
* In addition, the following methods should be
* callable on a MessageLog object:
* logMessage( {string} messageText, {number} direction) - This should log a
* message
* as either being sent or received. A direction of 0 indicates it is a message
* the user sent. A direction of 1 indicates it is a message the user received.
* Behavior for other numbers is undefined.
* getSentMessage({number} n) - returns as a string, the content of the nth most
* recently sent message. To conserve memory, the object should only keep the
* last 5 message. n=0 retrieves the most recent n=4 retrieves the least recent
* of the 5.
* totalSent() - returns an integer indicating the total number of messages sent
* totalReceived() - returns an integer indicating the total number of messages
* received
*/

//your code here
var MessageLog = function(user) {
  this.user = user;
  this.sentMessageCount = 0;      // initialize count of sent messages
  this.receivedMessageCount = 0;  // initialize count of received messages
  this.sentMessages = [];         // initialize empty array of sent messages
  this.receivedMessages = [];     //initialize empty array of received messages
  
  this.logMessage = function(messageText, direction) {
    if (direction === 0) {    
      // Move sent message to front of array and increment count
      this.sentMessages.unshift(messageText);
      this.sentMessageCount++;
    } else if (direction === 1) {
      // Move received message to front of array and increment count
      this.receivedMessages.unshift(messageText);
      this.receivedMessageCount++;
    }
  };
  
  // return nth sent message
  this.getSentMessage = function(n) {
    if (this.sentMessages.length > 5) 
      this.sentMessages.splice(5,1);    // retain only 5 most recent messages 
    return this.sentMessages[n];
  };
  
  // return total sent messages
  this.totalSent = function() {
    return this.sentMessageCount;
  };
  
  // return total received messages
  this.totalReceived = function() {
    return this.receivedMessageCount;
  };
};
//end your code

/**
* Add a method to the MessageLog prototype:
* lastReceivedMessage() - returns the message text of the last message the user
* received.
*/
//your code here
MessageLog.prototype.lastReceivedMessage = function() { 
  // Get the message at the end of the receivedMessages array
  return this.receivedMessages[this.receivedMessages.length - 1];
};
//end your code

/**
* Create an instance of a `MessageLog` for the user "BlackHatGuy". Have the
* instance receive 3 messages: "foo", "bar" and "baz", received in that order.
* Assign it to the variable myLog.
*/

//your code here
var myLog = new MessageLog('BlackhatGuy');
myLog.logMessage('foo', 1);
myLog.logMessage('bar', 1);
myLog.logMessage('baz', 1);
//end your code
