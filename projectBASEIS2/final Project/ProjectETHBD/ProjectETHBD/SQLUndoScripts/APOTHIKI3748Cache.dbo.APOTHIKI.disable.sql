IF EXISTS (SELECT * FROM sys.change_tracking_tables WHERE object_id = OBJECT_ID(N'[dbo].[APOTHIKI]')) 
   ALTER TABLE [dbo].[APOTHIKI] 
   DISABLE  CHANGE_TRACKING
GO
