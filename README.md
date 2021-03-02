# Nahamsec's Intro To Bug Bounty Labs

#### Intro

These are the labs that are used in Nahamsec's udemy course ["Intro To Bug Bounty"](https://www.udemy.com/course/intro-to-bug-bounty-by-nahamsec/)

#### Requirements
You must have docker installed, this can simply be installed using `apt install docker.io` for debian based operating systems or see https://docs.docker.com/get-docker/ for other distros and operating systems

##### Installation Instructions
`
docker build -t nahamsec .
`

`docker run -d -p 80:80 nahamsec`

#### Add the following entries to your /etc/hosts file

127.0.0.1          naham.sec  
127.0.0.1          www.naham.sec       
127.0.0.1          xss.naham.sec
127.0.0.1          xss1.naham.sec 
129.0.0.1          xss2.naham.sec    
130.0.0.1          xss3.naham.sec  
131.0.0.1          xss4.naham.sec  
132.0.0.1          or1.naham.sec  
133.0.0.1          or2.naham.sec  
134.0.0.1          csrf.naham.sec  
135.0.0.1          idor.naham.sec  
136.0.0.1          lfi.naham.sec  
137.0.0.1          sqli.naham.sec  
138.0.0.1          sqli2.naham.sec  
139.0.0.1          ssrf.naham.sec  
140.0.0.1          ssrf2.naham.sec  
141.0.0.1          ssrf3.naham.sec  
142.0.0.1          ssrf4.naham.sec  
143.0.0.1          ssrf5.naham.sec  
144.0.0.1          ssrf6.naham.sec  
145.0.0.1          ssrf7.naham.sec  
146.0.0.1          xxe.naham.sec  
147.0.0.1          xxe2.naham.sec  
148.0.0.1          upload.naham.sec  
149.0.0.1          upload2.naham.sec  
150.0.0.1          rce.naham.sec  
151.0.0.1          rce2.naham.sec  
152.0.0.1          rce3.naham.sec

Now you can visit http://www.naham.sec in your browser to view the list of challenges

##### Credits

Udemy course created by [Ben Sadeghipour](https://twitter.com/nahamsec) and labs created by [Adam Langley](https://twitter.com/adamtlangley)
