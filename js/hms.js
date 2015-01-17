function hmsg()
        {
                    var h=new Date();
                    var hours=h.getHours();
                    var minutes=h.getMinutes();
                    var seconds=h.getSeconds();
                    var dn="AM";
                    if (hours>12)
                    {
                        dn="PM";
                        hours=hours-12;
                    }
                    if (hours==0)
                         hours=12;
                    if (minutes<=9)
                         minutes="0"+minutes;
                    if (seconds<=9)
                         seconds="0"+seconds;
                         myclock=hours+":"+minutes+":"+seconds+" "+dn;
                    if (document.layers)
                    {
                         document.layers.hmsg.document.write(myclock);
                         document.layers.hmsg.document.close();
                    }
                    else if (document.all)
                              hmsg.innerHTML=myclock;
                                else if (document.getElementById)
                                            document.getElementById("hmsg").innerHTML=myclock;
                                            setTimeout("hmsg()",1000);
        }