
const { pollFromApi } = require('./poll');
require('./db');



setInterval(pollFromApi, 10000);