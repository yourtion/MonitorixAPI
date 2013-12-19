<?php
include_once('config.php');

function getUrl($when = "1day", $mode = "localhost",$graph = "all" , $color="black"){
	if(USER != "" and PASSWD !=""){
		$url = "http://".USER.":".PASSWD."@".HOST.PATH;
	}else{
		$url = "http://".HOST.PATH;
	}
	return $url."-cgi/monitorix.cgi?mode=".$mode."&graph=".$graph."&when=".$when."&color=".$color;
}

function imgUrl($imgurl){
	if(USER != "" and PASSWD !=""){
		return str_replace("http://".HOST,"http://".USER.":".PASSWD."@".HOST,$imgurl);
	}else{
		return $imgurl;
	}
}

function souceToName($souce){
	$map = array(
		"system1" => "System load",
		"system2" => "Active processes",
		"system3" => "Memory allocation",
		"kern1" => "Kernel usage",
		"kern2" => "Context switches and forks",
		"kern3" => "VFS usage",
		"proc" => "Processor",
		"proc0" => "Processor 0",
		"proc1" => "Processor 1",
		"hptemp1" => "Temperatures 1",
		"hptemp2" => "Temperatures 2",
		"hptemp3" => "Temperatures 3",
		"lmsens1" => "Core temperatures",
		"lmsens2" => "Voltages",
		"lmsens3" => "MB and CPU temperatures",
		"lmsens4" => "Fan speeds",
		"lmsens5" => "GPU temperatures",
		"nvidia1" => "NVIDIA temperatures",
		"nvidia2" => "CPU usage",
		"nvidia3" => "Memory usage",
		"disk1" => "Disk drives temperatures",
		"disk2" => "Reallocated sector count",
		"disk3" => "Current pending sector",
		"fs01" => "Filesystems usage",
		"fs02" => "Disk I/O activity",
		"fs03" => "Time spent in I/O activity",
		"fs11" => "Filesystems usage",
		"fs12" => "Disk I/O activity",
		"fs13" => "Time spent in I/O activity",
		"net01" => "eth0 Network traffic",
		"net02" => "eth0 Network packets",
		"net03" => "eth0 Network errors",
		"net11" => "eth1 Network traffic",
		"net12" => "eth1 Network packets",
		"net13" => "eth1 Network errors",
		"serv1" => "System services demand",
		"serv2" => "IMAP and POP3 services",
		"serv3" => "SMTP service",
		"mail1" => "Mail statistics",
		"mail2" => "Network traffic",
		"mail3" => "Mails in queue",
		"mail4" => "Queue size",
		"mail5" => "Greylisting",
		"port1i" => "SMTP Port traffic",
		"port2i" => "HTTP Port traffic",
		"port3i" => "SSH Port traffic",
		"port4i" => "POP3 Port traffic",
		"port5i" => "NETBIOS Port traffic",
		"port6i" => "MySQL Port traffic",
		"port7i" => "DNS Port traffic",
		"port8i" => "IMAP Port traffic",
		"port" => "Port",
		"user1" => "Users logged in",
		"user2" => "Samba users",
		"user3" => "Netatalk users",
		"ftp01" => "Commands usage",
		"ftp02" => "New sessions",
		"ftp03" => "FTP traffic",
		"apache1" => "Apache workers",
		"apache2" => "Apache CPU usage",
		"apache3" => "Apache requests",
		"nginx1" => "Nginx connections",
		"nginx2" => "Nginx requests",
		"nginx3" => "Nginx traffic",
		"lighttpd1" => "Lighttpd workers",
		"lighttpd2" => "Lighttpd traffic",
		"lighttpd3" => "Lighttpd requests",
		"mysql01" => "MySQL query types",
		"mysql02" => "MySQL overall stats",
		"mysql03" => "Table saturation and MyISAM",
		"mysql04" => "MySQL queries",
		"mysql05" => "MySQL connections",
		"mysql06" => "MySQL traffic",
		"squid1" => "Squid statistics 1",
		"squid2" => "Squid statistics 2",
		"squid3" => "Overall I/O",
		"squid4" => "Memory usage",
		"squid5" => "Store directory stats",
		"squid6" => "IP cache stats",
		"squid7" => "Network protocols usage",
		"squid8" => "Client traffic",
		"squid9" => "Server traffic",
		"nfss1" => "NFS server stats 1",
		"nfss2" => "NFS server stats 2",
		"nfss3" => "NFS server stats 3",
		"nfss4" => "Overall I/O",
		"nfss5" => "Network layer",
		"nfss6" => "RPC",
		"nfss7" => "Thread utilization",
		"nfss8" => "Read cache",
		"nfss9" => "File handle cache",
		"nfsc1" => "NFS client stats 1",
		"nfsc2" => "NFS client stats 2",
		"nfsc3" => "NFS client stats 3",
		"nfsc4" => "NFS client stats 4",
		"nfsc5" => "NFS client stats 5",
		"nfsc6" => "RPC client stats",
		"bind1" => "Incoming queries",
		"bind2" => "Outgoing queries (_default)",
		"bind3" => "Name server statistics",
		"bind4" => "Resolver statistics (_default)",
		"bind5" => "Cache DB RRsets (_default)",
		"bind6" => "Memory usage",
		"bind7" => "Task manager",
		"ntp1" => "NTP timing stats",
		"ntp2" => "Stratum level",
		"ntp3" => "Codes",
		"fail2ban" => "Fail2ban jails",
		"icecast1" => "Current Listeners",
		"icecast2" => "Bitrate",
		"raspberrypi1" => "Clock frequency",
		"raspberrypi2" => "Temperatures",
		"raspberrypi3" => "Voltages",
		"phpapc1" => "Memory usage",
		"phpapc2" => "Hits & misses",
		"phpapc3" => "File Cache",
		"memcached1" => "Memcached Statistics 1",
		"memcached2" => "Memcached Statistics 2",
		"memcached3" => "Cache usage",
		"memcached4" => "Items in Cache",
		"memcached5" => "Objects I/O",
		"memcached6" => "Connections",
		"memcached7" => "Memcached traffic",
		"wowza1" => "Current connections",
		"wowza2" => "Messages bytes rate",
		"wowza3" => "Connections accepted",
		"wowza4" => "Connections rejected",
		"wowza5" => "Streams",
		"int1" => "Interrupt activity",
		"int2" => "Core activity",
		"int3" => "Interrupt activity"
	);
	preg_match('/\/([^\/]+\.[a-z]+)[^\/]*$/',$souce,$imgName0);
	$imgName1 = explode(".",$imgName0[1]);
	$imgName = substr($imgName1[0],0,-1);
	return $map[$imgName];
}






