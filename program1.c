/* O class letters
Function name: open
Function: open a file for reading or writing.
Usage: int open (char * pathname, int access [int permiss]);
Example of program:
Code:
*/
# Include <string.h>
# Include <stdio.h>
# Include <fcntl.h>
# Include <io.h>

int main (void)
{
int handle;
char msg [] = "Hello world";

if ((handle = open ("TEST. $ $ $", O_CREAT | O_TEXT)) == -1)
{
perror ("Error:");
return 1;
}
write (handle, msg, strlen (msg));
close (handle);
return 0;
}

