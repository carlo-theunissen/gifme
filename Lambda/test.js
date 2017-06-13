/**
 * Created by carlotheunissen on 13/06/2017.
 */
var jwt = require('jsonwebtoken');
var fs = require('fs');
var cert = fs.readFileSync('private.pem');  // get private key
var token = jwt.sign(
    {
        exp: Math.floor(Date.now() / 1000) + 60*60,
        data: 'LAMBDA_USER'
    }, {
        key: cert,
        passphrase :"G~z'E1B\"{aTkkJ7TSkU~XWz&{DQ)5!vcZ_5XTdrU2+c)5<8W@(@BHwO)6u(2_bF"
    }, { algorithm: 'RS256'});
console.log(token);
