IF EXISTS (SELECT * FROM sys.change_tracking_tables WHERE object_id = OBJECT_ID(N'[dbo].[PELATIS]')) 
   ALTER TABLE [dbo].[PELATIS] 
   DISABLE  CHANGE_TRACKING
GO
