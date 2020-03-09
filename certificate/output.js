function output() 
{

    var provider = ethers.getDefaultProvider('rinkeby');

    var contractAddress  = "0x6bff1ec42e43739756fc20d02c59be6fab67997f";

    var abi = [ { "constant": false, "inputs": [ { "name": "_adminAddress", "type": "address" } ], "name": "addAdmin", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "anonymous": false, "inputs": [ { "indexed": true, "name": "_certiID", "type": "uint256" }, { "indexed": true, "name": "_userId", "type": "uint256" }, { "indexed": false, "name": "_name", "type": "string" }, { "indexed": false, "name": "_course", "type": "string" }, { "indexed": false, "name": "_belt", "type": "uint256" }, { "indexed": false, "name": "_percentile", "type": "uint256" } ], "name": "CertificateGenerated", "type": "event" }, { "constant": false, "inputs": [ { "name": "_userId", "type": "uint256" }, { "name": "_name", "type": "string" }, { "name": "_course", "type": "string" }, { "name": "_belt", "type": "uint256" }, { "name": "_percentile", "type": "uint256" } ], "name": "issueCertificate", "outputs": [ { "name": "", "type": "uint256" } ], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "_adminAddress", "type": "address" } ], "name": "removeAdmin", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "inputs": [], "payable": false, "stateMutability": "nonpayable", "type": "constructor" }, { "constant": true, "inputs": [ { "name": "", "type": "uint256" } ], "name": "certificateDatabase", "outputs": [ { "name": "userID", "type": "uint256" }, { "name": "name", "type": "string" }, { "name": "course", "type": "string" }, { "name": "belt", "type": "uint256" }, { "name": "percentile", "type": "uint256" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": true, "inputs": [], "name": "getTotalCertificateCount", "outputs": [ { "name": "", "type": "uint256" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": true, "inputs": [ { "name": "", "type": "address" } ], "name": "isAdmin", "outputs": [ { "name": "", "type": "bool" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": true, "inputs": [], "name": "superAdmin", "outputs": [ { "name": "", "type": "address" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": true, "inputs": [], "name": "viewLatestCertificateNumber", "outputs": [ { "name": "", "type": "uint256" } ], "payable": false, "stateMutability": "view", "type": "function" } ];

    // var privateKey = "95f517aef544ccd544b5c8bab48ee7daec50bf2aa3ca6cd8f0a9a21328a69608";

    // var wallet = new ethers.Wallet(privateKey,provider);

    var contract = new ethers.Contract(contractAddress,abi,provider);

    contract.certificateDatabase(document.getElementById('_cid').value)
            .then((result) => {
            console.log(result);
            console.log("UID:",(result.userID).toString());
            document.getElementById('_uid').value = (result.userID).toString();
            console.log("Name:",result.name);
            document.getElementById('_name').value = result.name;
            console.log("Course:",result.course);
            document.getElementById('_course').value = result.course;
            console.log("Belt no:",(result.belt).toString());

            // document.getElementById('_belt').value = belt;
            console.log("Percentile:",(result.percentile).toString());
            document.getElementById('_percentile').value = (result.percentile).toString();
            });
        

}
