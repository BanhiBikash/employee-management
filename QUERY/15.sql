SELECT dno,ename,job_type FROM employee WHERE dno=(SELECT dno FROM department where dname='sales')