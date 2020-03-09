
import { ethers } from 'ethers';
var provider = new ethers.providers.Web3Provider(web3.currentProvider,"rinkeby");

var address  = "0xb01b8a53c0af180d8e2bd1e5ce951aa9b041c7e3";

var abi = 
[
	{
		"constant": true,
		"inputs": [
			{
				"name": "_uid",
				"type": "uint256"
			},
			{
				"name": "_name",
				"type": "string"
			},
			{
				"name": "_course",
				"type": "string"
			},
			{
				"name": "_percentile",
				"type": "uint256"
			}
		],
		"name": "verifyCertificateUsingDetails",
		"outputs": [
			{
				"name": "",
				"type": "bool"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [],
		"name": "certificateAuthority",
		"outputs": [
			{
				"name": "",
				"type": "address"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [
			{
				"name": "_uid",
				"type": "uint256"
			},
			{
				"name": "_name",
				"type": "string"
			},
			{
				"name": "_course",
				"type": "string"
			},
			{
				"name": "_percentile",
				"type": "uint256"
			}
		],
		"name": "issueCertificate",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [],
		"name": "certificateAuthorityName",
		"outputs": [
			{
				"name": "",
				"type": "string"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [
			{
				"name": "_certificateAuthorityName",
				"type": "string"
			}
		],
		"payable": true,
		"stateMutability": "payable",
		"type": "constructor"
	},
	{
		"anonymous": false,
		"inputs": [
			{
				"indexed": false,
				"name": "key",
				"type": "bytes32"
			}
		],
		"name": "Issued",
		"type": "event"
	}
];


// var privateKey = "95f517aef544ccd544b5c8bab48ee7daec50bf2aa3ca6cd8f0a9a21328a69608";
// console.log(privateKey);

// var wallet = new ethers.Wallet(privateKey,provider);
// console.log(wallet);

var contract = new ethers.Contract(address,abi,provider);
console.log(contract);
