#include <stdlib.h>
#include <stdio.h>
#include <time.h>
#define N 30000
#define M 20

int getUniqueNumber(int p[N],int i);
int bubbleSort(int p[N]);
int straightSelectionSort(int p[N]);
int straightInsertionSort(int p[N]);
int quickSort(int left,int right,int p[N],int swaps);
void printToFile(FILE *f,int count);
void tab(FILE *f);
void arrangeSwapsFile(FILE *f1);
void arrangeTimeFile(FILE *f2);
void runBubbleSort(int p[N],float *results);
void runSelectionSort(int p[N],float *results);
void runInsertionSort(int p[N],float *results);
void runQuickSort(int p[N],float *results);

int main()
{
	srand(time(NULL));
	int l,k;
	int p[N];
	float results[2]={0,0};
	FILE *f1,*f2;
	float bsSwapsSum=0,bsDtSum=0,bsSwapsAvg=0,bsDtAvg=0;
	float ssSwapsSum=0,ssDtSum=0,ssSwapsAvg=0,ssDtAvg=0;
	float isSwapsSum=0,isDtSum=0,isSwapsAvg=0,isDtAvg=0;
	float qsSwapsSum=0,qsDtSum=0,qsSwapsAvg=0,qsDtAvg=0;
	
	arrangeSwapsFile(f1);
	arrangeTimeFile(f2);

	for(l=0;l<M;l++)
	{
		printf("Getting %d random numbers....",N);
		for (k=0;k<N;k++)
		{
			p[k]=getUniqueNumber(p,k);
		}
		printf("complete.\n");

		runBubbleSort(p,results);
		bsSwapsSum=bsSwapsSum+results[0];
		bsDtSum=bsDtSum+results[1]; 

		runSelectionSort(p,results);
		ssSwapsSum=ssSwapsSum+results[0];
		ssDtSum=ssDtSum+results[1];

		runInsertionSort(p,results);
		isSwapsSum=isSwapsSum+results[0];
		isDtSum=isDtSum+results[1];

		runQuickSort(p,results);
		qsSwapsSum=qsSwapsSum+results[0];
		qsDtSum=qsDtSum+results[1];
		
	}

	bsSwapsAvg=bsSwapsSum/M;
	ssSwapsAvg=ssSwapsSum/M;
	isSwapsAvg=isSwapsSum/M;
	qsSwapsAvg=qsSwapsSum/M;
	bsDtAvg=bsDtSum/M;
	ssDtAvg=ssDtSum/M;
	isDtAvg=isDtSum/M;
	qsDtAvg=qsDtSum/M;
	
	f1=fopen("FINAL Swaps.txt","a");
	f2=fopen("FINAL Time.txt","a");
	fprintf(f1,"\n    Avg: \t%.1f \t%.1f \t\t%.1f \t%.1f",bsSwapsAvg,ssSwapsAvg,isSwapsAvg,qsSwapsAvg);
	fprintf(f2,"\n    Avg: \t%.1f \t\t%.1f \t\t%.1f \t\t%.1f",bsDtAvg,ssDtAvg,isDtAvg,qsDtAvg);
	fclose(f1);
	fclose(f2);
	
	system("PAUSE");
	return 0;
}

void runBubbleSort(int p[N],float *results)
{
	long t0,t1,dt;
	int counter=0;
	int z,temp[N];
	results[0]=0;
	results[1]=0;
	FILE *f1,*f2;
	
	f1=fopen("FINAL Swaps.txt","a");
	f2=fopen("FINAL Time.txt","a");

	for (z=0;z<N;z++)
	{
		temp[z]=p[z];
	}
	
	tab(f1);
	tab(f2);
	time(&t0);
	counter=bubbleSort(temp);
	time(&t1);
	dt=t1-t0;
	printToFile(f1,counter);
	printToFile(f2,dt);
		
	results[0]=counter;
	results[1]=dt;

	fclose(f1);
	fclose(f2);
}

void runSelectionSort(int p[N],float *results)
{
	long t0,t1,dt;
	int counter=0;
	int z,temp[N];
	results[0]=0;
	results[1]=0;
	FILE *f1,*f2;
		
	f1=fopen("FINAL Swaps.txt","a");
	f2=fopen("FINAL Time.txt","a");

	for (z=0;z<N;z++)
	{
		temp[z]=p[z];
	}
	
	tab(f1);
	tab(f2);
	time(&t0);	
	counter=straightSelectionSort(temp);
	time(&t1);
	dt=t1-t0;
	printToFile(f1,counter);
	printToFile(f2,dt);
	
	fclose(f1);
	fclose(f2);
	
	results[0]=counter;
	results[1]=dt;
}

void runInsertionSort(int p[N],float *results)
{
	long t0,t1,dt;
	int counter=0;
	int z,temp[N];
	results[0]=0;
	results[1]=0;
	FILE *f1,*f2;
	
	f1=fopen("FINAL Swaps.txt","a");
	f2=fopen("FINAL Time.txt","a");
	
	for (z=0;z<N;z++)
	{
		temp[z]=p[z];
	}
		
	tab(f1);
	tab(f2);
	time(&t0);
	counter=straightInsertionSort(temp);
	time(&t1);
	dt=t1-t0;
	printToFile(f1,counter);
	printToFile(f2,dt);
	
	fclose(f1);
	fclose(f2);
	
	results[0]=counter;
	results[1]=dt;
}

void runQuickSort(int p[N],float *results)
{
	long t0,t1,dt;
	int counter=0;
	int z,temp[N];
	results[0]=0;
	results[1]=0;
	FILE *f1,*f2;
	
	f1=fopen("FINAL Swaps.txt","a");
	f2=fopen("FINAL Time.txt","a");
	
	for (z=0;z<N;z++)
	{
		temp[z]=p[z];
	}

	tab(f1);
	tab(f2);
	time(&t0);
	counter=quickSort(0,N-1,temp,0);
	time(&t1);
	dt=t1-t0;
	printToFile(f1,counter);
	printToFile(f2,dt);
	fprintf(f1,"\n");
	fprintf(f2,"\n");
	
	fclose(f1);
	fclose(f2);
	
	results[0]=counter;
	results[1]=dt;	
}

int getUniqueNumber(int p[N],int i)
{
	int x,j,found;
	
	do
	{
		x=rand();
		found=0;
		j=0;
		while(j<=i&&found==0)
		{
			if (p[j]==x)
				found=1;
			else
				j++;
		}
	}while(found==1);
	
	return x;
}

int bubbleSort(int p[N])
{
	int i,j,temp;
	int swaps=0;
		
	for(i=1;i<N;i++)
		for(j=N-1;j>=i;j--)
			if(p[j-1]>p[j])
			{
				swaps++;
				temp=p[j-1];
				p[j-1]=p[j];
				p[j]=temp;
			}
	return swaps;
}

int straightSelectionSort(int p[N])
{
	int i=0,j=0,k=0,min=0;
	int swaps=0;
	
	for(i=0;i<N-1;i++)
	{
		k=i;
		min=p[i];
		for(j=i+1;j<N;j++)
		{
			if(p[j]<min)
			{
				k=j;
				min=p[j];
			}
		}
		p[k]=p[i];
		p[i]=min;
		swaps++;
	}
	return swaps;
}

int straightInsertionSort(int p[N])
{
	int i=0,x=0,j=0;
	int swaps=0;
	
	for(i=2;i<=N;i++)
	{
		x=p[i];
		p[0]=x;
		j=i-1;
		while(x<p[j])
		{
			swaps++;
			p[j+1]=p[j];
			j=j-1;
		}
		p[j+1]=x;
		swaps++;
	}
	
	return swaps;
}

int quickSort(int left,int right,int p[N],int swaps)
{
	int i,j,mid,x,temp;
	
	if(left<right)
	{	
		i=left;
		j=right;
		mid=(left+right)/2;
		x=p[mid];
		while(i<j)
		{
			while(p[i]<x)
				i++;
			while(p[j]>x)
				j--;
			if(i<j)
			{
				if(p[i]==p[j])
				{
					if(i<mid)
						i++;
					if(j>mid)
						j--;
				}
				else
				{
					swaps++;
					temp=p[i];
					p[i]=p[j];
					p[j]=temp;
				}
			}
		}
		swaps=quickSort(left,j-1,p,swaps);
		swaps=quickSort(j+1,right,p,swaps);
	}
	return swaps;
}

void printToFile(FILE *f,int count)
{
	fprintf(f,"%d\t",count);
}

void tab(FILE *f)
{	
	fprintf(f,"\t");
}
void arrangeSwapsFile(FILE *f1)
{
	f1=fopen("FINAL Swaps.txt","w");
	fprintf(f1,"    ARRAY SIZE = %d\n\n",N);
	fprintf(f1,"\t\t\t\tTABLE OF SWAPS\n\n");
	fprintf(f1,"\tBubble_sort\tSelection_sort\tInsertion_sort\tQuick_sort\n");
	fprintf(f1,"\t=============== ================ =============== ==========\n");
	fclose(f1);
	
}
void arrangeTimeFile(FILE *f2)
{
	f2=fopen("FINAL Time.txt","w");
	fprintf(f2,"    ARRAY SIZE = %d\n\n",N);
	fprintf(f2,"\t\t\tTABLE OF EXECUTION TIMES(in seconds)\n\n");
	fprintf(f2,"\tBubble_sort\tSelection_sort\tInsertion_sort\tQuick_sort\n");
	fprintf(f2,"\t=============== ================ =============== ==========\n");
	fclose(f2);
}

